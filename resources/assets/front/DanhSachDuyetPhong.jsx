import React from 'react'
import ReactDom from 'react-dom'
import axios from 'axios'

class PhongDuyetItem extends React.Component {
    constructor(props) {
        super(props)
        this.state = {
            tinhTrangDuyet: this.props.phongDuyet.tinhTrangDuyet
        }
        this.thayDoiTinhTrangDuyet = this.thayDoiTinhTrangDuyet.bind(this)
        this.xemPhong = this.xemPhong.bind(this)
    }

    xemPhong() {
        location.assign(location.origin + '/Phong/' + this.props.phongDuyet.maPhong)
    }

    thayDoiTinhTrangDuyet(event) {
        this.setState({tinhTrangDuyet: Number(event.target.value)})
        this.props.updateTinhTrangDuyet(event.target.value)
    }

    render() {
        let backgroundImage = 'url(' + location.origin + '/storage/img/' + this.props.phongDuyet.pathImg + ')'
        return(
            <li >
                <div>
                    <div>
                        <div className='img-nhatro' onClick={this.xemPhong}>
                            <div style={{ backgroundImage }}>
                            </div>
                        </div>
                        <div className="noi-dung" onClick={this.xemPhong}>
                            <div className="title">{this.props.phongDuyet.tenPhong}</div>
                            {this.props.phongDuyet.noiDung}
                        </div>
                        <div className="radio">
                            <label>
                                <input type="radio" name={this.props.phongDuyet.maPhong} value="1"
                                    defaultChecked={this.state.tinhTrangDuyet == 1} onChange={this.thayDoiTinhTrangDuyet}/>
                                <span className="checkmark">
                                    <span className="glyphicon glyphicon-ok" data-toggle="tooltip" title="Duyệt"></span>
                                    Duyệt
                                </span>
                            </label>
                            <label>
                                <input type="radio" name={this.props.phongDuyet.maPhong} value="2" 
                                    defaultChecked={this.state.tinhTrangDuyet == 2} onChange={this.thayDoiTinhTrangDuyet}/>
                                <span className="checkmark">
                                    <span className="glyphicon glyphicon-remove" data-toggle="tooltip" title="Khóa Phòng"></span>
                                    Khóa
                                </span>
                            </label>
                            <label>
                                <input type="radio" name={this.props.phongDuyet.maPhong} value="0"
                                    defaultChecked={this.state.tinhTrangDuyet == 0} onChange={this.thayDoiTinhTrangDuyet}/>
                                <span className="checkmark">
                                    <span className="glyphicon glyphicon-pushpin" data-toggle="tooltip" title="Chờ Duyệt"></span>
                                    Chờ
                                </span>
                            </label>
                        </div>
                    </div>
                </div>
            </li>
        )
    }
}

class DanhSachDuyetPhong extends React.Component {
    constructor(props) {
        super(props)
        this.state = {
            skip: 0,
            dsPhong: []
        }
        this.getDanhSachDuyetPhong = this.getDanhSachDuyetPhong.bind(this)
        this.updateTinhTrangDuyet = this.updateTinhTrangDuyet.bind(this)
    }
    componentDidMount() {
        this.getDanhSachDuyetPhong()
    }

    getDanhSachDuyetPhong() {
        axios.post('GetDanhSachPhongDuyet', {
            _token: $('meta[name="csrf-token"]').attr('content'),
            skip: this.state.skip
        }).then((res) => {
            this.setState((prevState, props) => {
                let dsPhong = prevState.dsPhong
                let skip = prevState.skip

                res.data.map((value, index) => dsPhong.push(value))
                skip += res.data.length
                return {dsPhong, skip}
            })
        })
    }
    updateTinhTrangDuyet(index, tinhTrangDuyet) {
        axios.post('UpdateTinhTrangDuyet', {
            _token: $('meta[name="csrf-token"]').attr('content'),
            maPhong: this.state.dsPhong[index].maPhong,
            tinhTrangDuyet
        })
    }
    render() {
        return(
            <ul className="new-ul">
                {
                    this.state.dsPhong.map((va, index) => 
                        <PhongDuyetItem key={index} phongDuyet={va} 
                        updateTinhTrangDuyet={(tinhTrangDuyet) => this.updateTinhTrangDuyet(index, tinhTrangDuyet)}/>
                    )
                }
            </ul>
        )
    }
}

ReactDom.render(
    <DanhSachDuyetPhong />,
    document.getElementById('danhsachduyetphong')
)