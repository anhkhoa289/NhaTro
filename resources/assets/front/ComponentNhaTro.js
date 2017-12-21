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
            skip: 0
        }
        this.getJSON = this.getJSON.bind(this)
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
                <ul className="new-ul">
                    {
                        this.state.mang.map((va, inde) =>
                            <PhongCuaToiItem key={inde} urlEdit={va.urlEdit} tenPhong={va.tenPhong} 
                            noiDung={va.noiDung} backgroundImg={va.backgroundImg} sdt={va.sdt}/>
                        )
                    }
                    {xemThem}
                    {theEnd}
                </ul>
        )
    }
}


class PhongCuaToiItem extends React.Component {
    constructor(props) {
        super(props)
        this.state = {
            sdtStatus : false
        }
        this.changeSdtStatus = this.changeSdtStatus.bind(this)
    }
    changeSdtStatus() {
        this.setState({sdtStatus : !this.state.sdtStatus})
    }
    render() {
        const divStyle = {
            backgroundImage:'url('+ this.props.backgroundImg + ')'
        }

        let sdt = null
        let chevron = <Chevron type={"down"} title={"Mở rộng"} onClick={this.changeSdtStatus}/>
        if(this.state.sdtStatus) {
            chevron = <Chevron type={"up"} title={"Thu nhỏ"} onClick={this.changeSdtStatus}/>
            sdt = <CompSdt sdt={this.props.sdt}/>
        }
        return (
            <li >
                <div>
                    <div>
                        <div className='img-nhatro' onClick={this.changeSdtStatus}>
                            <div style={divStyle}></div>
                        </div>
                        <div className="noi-dung" onClick={this.changeSdtStatus}>
                            <div className="title">{this.props.tenPhong}</div>
                            {this.props.noiDung}
                        </div>
                        <div className="action">
                            <a href={this.props.urlEdit}>
                                <span className="glyphicon glyphicon-edit" data-toggle="tooltip" title="Chỉnh Sửa"></span>
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