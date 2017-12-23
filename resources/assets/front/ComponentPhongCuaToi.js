import React from 'react'
import ReactDOM from 'react-dom'
import axios from 'axios'

export class PhongCuaToi extends React.Component{
    constructor(props) {
        super(props)
        this.state = {
            mang : [],
            thongbao: true,
            remaining: true,
            skip: 0,
            deleteItem : null,
            deleteIndex: null
        }
        this.getJSON = this.getJSON.bind(this)
        this.actionDelete = this.actionDelete.bind(this)
    }
    getJSON() {
        let mang = this.state.mang
        let token = $('meta[name="csrf-token"]').attr('content')
        let skip = this.state.skip
        axios.get('/Account/render?_token=' + token + '&skip=' + skip)
            .then((res) => {
                res.data.map(value => mang.push(value))
                this.setState({
                    mang : mang,
                    skip: mang.length 
                })
                if(res.data.length < 10)
                    this.setState({remaining: false})
            })
            .catch((err) => {
                console.log(err)
            })

    }
    deleteAction(phong, index) {
        this.setState({deleteItem: phong, deleteIndex: index})
        $("#xoa-phong").modal('show')
    }
    actionDelete() {
        axios.post(location.origin + '/Account/delete', {
            _token: $('meta[name="csrf-token"]').attr('content'),
            maPhong: this.state.deleteItem.maPhong
        }).then((res) => {
            if(res.data = 'success') {
                
                this.setState((prevState, props) => {
                    let mang = prevState.mang
                    mang.splice(prevState.deleteIndex, 1)
                    skip = prevState - 1
                    return {deleteItem: null, deleteIndex: null, mang: mang, skip: skip}
                })
                $("#xoa-phong").modal('hide')
            }
        })
    }
    componentDidMount() {
        window.addEventListener('scroll', () => {
            if(this.state.remaining)
                if(($(window).scrollTop() + $(window).height() == $(document).height()))
                    this.getJSON()
        })
    }
    componentWillUnmount() {
        window.removeEventListener('scroll', this.atFooter);

    }
    render() {
        let xemThem = <li className="xem-them" onClick={this.getJSON}>Xem thêm</li>
        let theEnd = null
        if(!this.state.remaining) {
            xemThem = null
            theEnd = <li className="the-end">Không còn phòng để hiển thị</li>
        }

        return (
            <div>
                <ul className="new-ul">
                    {
                        this.state.mang.map((va, index) =>
                            <PhongCuaToiItem key={index} phong={va}
                            deleteAction={() => this.deleteAction(va, index)}/>
                        )
                    }
                    {xemThem}
                    {theEnd}
                </ul>
                
                <div id="xoa-phong" className="modal fade" role="dialog">
                    <div className="modal-dialog">

                        <div className="modal-content">
                            <div className="modal-header">
                                <button type="button" className="close" data-dismiss="modal">&times;</button>
                                <h4 className="modal-title">Xóa Phòng Trọ</h4>
                            </div>
                            <div className="modal-body">
                                Bạn có chắc muốn xóa phòng:
                                <div>
                                    <b>{(this.state.deleteItem != null) ? this.state.deleteItem.tenPhong : null}</b>
                                </div>
                            </div>
                            <div className="modal-footer">
                                <button type="button" className='btn btn-success my-btn-success' id="xacNhan"
                                    onClick={this.actionDelete}>Xác nhận</button>
                                <button type="button" className="btn btn-default" data-dismiss="modal">Đóng lại</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        )
    }
}

class PhongCuaToiItem extends React.Component {
    constructor(props) {
        super(props)
        this.state = {
            sdtStatus : false,
            tinhTrangHienThi: this.props.phong.tinhTrangHienThi
        }
        this.changeSdtStatus = this.changeSdtStatus.bind(this)
        this.changeTinhTrangHienThi = this.changeTinhTrangHienThi.bind(this)
    }
    changeSdtStatus() {
        this.setState({sdtStatus : !this.state.sdtStatus})
    }
    changeTinhTrangHienThi() {
        let tinhTrangHienThi = this.state.tinhTrangHienThi
        if(tinhTrangHienThi == 1)
            tinhTrangHienThi = 0
        else
            tinhTrangHienThi = 1
        axios.post(location.origin + '/Account/hide', {
            _token: $('meta[name="csrf-token"]').attr('content'),
            maPhong: this.props.phong.maPhong,
            tinhTrangHienThi
        }).then((res) => {
            if(res.data = 'success') {
                this.setState({tinhTrangHienThi})
            }
        })
    }
    render() {
        let sdt = null
        let chevron = <Chevron type={"down"} title={"Mở rộng"} onClick={this.changeSdtStatus}/>
        if(this.state.sdtStatus) {
            chevron = <Chevron type={"up"} title={"Thu nhỏ"} onClick={this.changeSdtStatus}/>
            sdt = <CompSdt sdt={this.props.phong.sdt}/>
        }
        return (
            <li >
                <div>
                    <div>
                        <div className='img-nhatro' onClick={this.changeSdtStatus}>
                            <div style={{backgroundImage:'url('+ this.props.phong.backgroundImg + ')'}}></div>
                        </div>
                        <div className="noi-dung" onClick={this.changeSdtStatus}>
                            <div className="title">{this.props.phong.tenPhong}</div>
                            {this.props.phong.noiDung}
                        </div>
                        <div className="action">
                            <a onClick={this.changeTinhTrangHienThi} className="edit">
                                <span className={(this.state.tinhTrangHienThi == 1)? "glyphicon glyphicon-eye-open" : "glyphicon glyphicon-eye-close"} 
                                data-toggle="tooltip" title="Ản Phòng"></span>
                            </a>
                            <a href={this.props.phong.urlEdit} className="edit">
                                <span className="glyphicon glyphicon-edit" data-toggle="tooltip" title="Chỉnh Sửa"></span>
                            </a>
                            <a onClick={this.props.deleteAction} className="trash">
                                <span className="glyphicon glyphicon-trash" data-toggle="tooltip" title="Xóa"></span>
                            </a>
                            {chevron}
                        </div>
                    </div>
                    {sdt}
                </div>
            </li>
        )
    }
}

function Chevron(props) {
    return <span className={"glyphicon glyphicon-chevron-" + props.type} 
            data-toggle="tooltip" title={props.title}
            onClick={props.onClick}></span>
}

function CompSdt(props) {
    return (
        <div className="table">
            <table className="table table-hover">
                <thead>
                    <tr>
                        <th>Số điện thoại của khách hàng đã đặt chỗ</th>
                        <th>Đặt chỗ lúc</th>
                    </tr>
                </thead>
                <tbody>
                    {props.sdt.map((value, index) => 
                        ( 
                            <tr key={index}>
                                <td>{value.sdtKhachHang}</td>
                                <td>{value.datChoLuc}</td>
                            </tr>
                        )
                    )}
                    
                </tbody>
            </table>
        </div>
    )
}
