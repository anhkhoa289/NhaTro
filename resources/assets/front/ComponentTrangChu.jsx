import React from 'react'
import ReactDom from 'react-dom'
import axios from 'axios'

function GiaTien(props) {
    return (
        <select className="form-control" name="giaTien">
            {props.giaTien.map((value, index) => 
                <option key={index} value={value.value} min={value.min} max={value.max}>{value.name}</option>
            )}
        </select>
    )
}

function DienTich(props) {
    return (
        <select className="form-control" name="dienTich">
            {props.dienTich.map((value, index) => 
                <option key={index} value={value.value} min={value.min} max={value.max}>{value.name}</option>
            )}
        </select>
    )
}

function FilterConditional(props) {
    let c = 'cond'
    if(props.name.length > 35) c = 'cond long-cond'
    return (
        <div>
            <div className={c}>
                <button onClick={props.remove}><span className="glyphicon glyphicon-remove"></span></button>
                <span>{props.name}</span>
            </div>
        </div>
    )
}

class DiaPhuong extends React.Component{

    constructor(props) {
        super(props)

        this.getQuan = this.getQuan.bind(this)
        this.updateQuan = this.updateQuan.bind(this)
        this.updatePhuong = this.updatePhuong.bind(this)
        this.getTinh = this.getTinh.bind(this)

        this.state = {
            tinh: [],
            quan: [],
            phuong: [],
        }
        this.getTinh()
        this.getQuan('Hà Nội')
    }
    getTinh() {
        axios.post(location.origin + '/getTinhs', {
            _token: $('meta[name="csrf-token"]').attr('content')
        }).then((res) => {
            this.setState({tinh: res.data})
        })
    }
    getQuan(tenTinh) {
        axios.post(location.origin + '/getQuan',{
            _token: $('meta[name="csrf-token"]').attr('content'),
            tenTinh: tenTinh
        }).then((res) => {
            let data = [{
                "maQuan": null, "tenQuan": null, "phuong": [
                    {maPhuong: null, tenPhuong: null}
                ]
            }]
            res.data.forEach((value) => data.push(value))
            this.setState({quan: data, phuong: data[0].phuong})
        })
    }

    updateQuan(event) {
        this.getQuan(event.target.value)
    }

    updatePhuong(event) {
        this.state.quan.forEach((val) => {
            if(val.tenQuan == event.target.value) {
                let phuong = [{maPhuong: null, tenPhuong: null}]
                val.phuong.forEach((v) => phuong.push(v))
                this.setState({phuong})
            }
        }, this)
    }

    render() {
        return (
            <div className="dia-phuong">
                <select className="form-control" name="tinh" onChange={this.updateQuan}>
                    {
                        this.state.tinh.map((value, index) =>
                            <option key={index} value={value.tenTinh}>{value.tenTinh}</option>
                        )
                    }
                </select>
                <select className="form-control" name="quan" onChange={this.updatePhuong}>
                    {
                        this.state.quan.map((value, index) =>
                            <option key={index} value={value.tenQuan}>{value.tenQuan}</option>
                        )
                    }
                </select>
                <select className="form-control" name="phuong">
                    {
                        this.state.phuong.map((value, index) =>
                            <option key={index} value={value.tenPhuong}>{value.tenPhuong}</option>
                        )
                    }
                </select>
            </div>
        )
    }
}

export class SearchPanel extends React.Component {

    constructor(props) {
        super(props)
        this.state = {
            display: 'nav', //[nav, diaphuong, giatien, dientich]
            item: [
                { id: 'diaphuong', name: 'Địa phương' },
                { id: 'giatien', name: 'Giá tiền' },
                { id: 'dientich', name: 'Diện tích' },
            ],
            filterCond: []
        }
        this.changeDisplayStatus = this.changeDisplayStatus.bind(this)
        this.addCond = this.addCond.bind(this)

        this.removeCond = this.removeCond.bind(this)
        this.checkCond = this.checkCond.bind(this)
    }
    
    componentDidMount() {
        window.addEventListener('scroll', () => this.flowSearch())
    }
    
    flowSearch(position = null) {
        let height = $('#navbar-phongtro').height() + 22
        if($(window).scrollTop() > height)
            $('#search-panel').css('margin-top', $(window).scrollTop() - height + 'px')
        else
            $('#search-panel').css('margin-top', 0 + 'px')
    }

    /**
     * Filter
     */
    changeDisplayStatus(id = 'nav') {
        this.setState({display: id})
    }

        /** kiểm tra điều kiện có tồn tại
         * @param type loại điều kiện
         */
    checkCond(type) {
        let ind = false
        this.state.filterCond.forEach((value, index) => {
            if(value.type === type)
                ind = index
        })
        return ind
    }
        
    addCond(idItem) {
        // kiểm tra điều kiện trùng lặp
        let index = this.checkCond(idItem)
        if(index !== false)
            this.removeCond(index, true)

        // tạo điều kiện mới
        let itemCond
        switch(idItem) {
            case 'diaphuong':
                itemCond = {
                    type: 'diaphuong',
                    value: null,
                    name: $('select[name="tinh"] option:selected').text() + ' - '
                        + $('select[name="quan"] option:selected').text() + ' - '
                        + $('select[name="phuong"] option:selected').text(), 
                    
                    tinh: $('select[name="tinh"] option:selected').val(),
                    quan: $('select[name="quan"] option:selected').val(),
                    phuong: $('select[name="phuong"] option:selected').val()
                }
                break
            case 'giatien':
                itemCond = {
                    type: 'giatien',
                    value: $('select[name="giaTien"]').val(),
                    name: $('select[name="giaTien"] option:selected').text(),
                    min:  $('select[name="giaTien"] option:selected').attr('min'),
                    max: $('select[name="giaTien"] option:selected').attr('max')
                }
                break
            case 'dientich':
                itemCond = {
                    type: 'dientich',
                    value: $('select[name="dienTich"]').val(),
                    name: $('select[name="dienTich"] option:selected').text(),
                    min:  $('select[name="dienTich"] option:selected').attr('min'),
                    max: $('select[name="dienTich"] option:selected').attr('max')
                }
                break
            case 'ten':
                itemCond = {
                    type: 'ten',
                    value: $('input[name="timKiem"]').val(),
                    name: $('input[name="timKiem"]').val() 
                }
                break
        }

        // thêm điều kiện mới
        let newFilterCond = this.state.filterCond
        newFilterCond.push(itemCond)
        this.setState({filterCond: newFilterCond})

        // đổi trạng thái nav filter
        this.changeDisplayStatus()

        // đặt lại scrollTop
        $(window).scrollTop(0)

        // Cập nhật trang chủ
        this.props.capNhatDanhSach(newFilterCond)
    }

    /**
     * Filter Conditional
     * xóa điều kiện
     * @param index stt trong mảng điều kiện
     */
    removeCond(index, funcCall = false) {
        let newFilterCond = this.state.filterCond
        newFilterCond.splice(index, 1)
        this.setState({filterCond : newFilterCond})
        
        if(!funcCall) {
            // đặt lại scrollTop
            $(window).scrollTop(0)
            // Cập nhật trang chủ
            this.props.capNhatDanhSach(newFilterCond)
        }
    }

    render() {

        // Filter
        let nav
        let back = <button className="back" onClick={() => this.changeDisplayStatus('nav')}>
                        <span className="glyphicon glyphicon-chevron-left"></span>
                    </button>
        let giaTien = null, 
            diaPhuong = null, 
            dienTich = null, 
            ok = null

        switch(this.state.display) {
            case 'diaphuong': 
                nav = back
                diaPhuong = <DiaPhuong />
                ok = <button className="ok" onClick={() => this.addCond('diaphuong')}>
                        <span className="glyphicon glyphicon-ok"></span>
                    </button>
                break
            case 'giatien': 
                nav = back
                giaTien = <GiaTien giaTien={this.props.giaTien} />
                ok = <button className="ok" onClick={() => this.addCond('giatien')}>
                        <span className="glyphicon glyphicon-ok"></span>
                    </button>
                break
            case 'dientich': 
                nav = back
                dienTich = <DienTich dienTich={this.props.dienTich} />
                ok = <button className="ok" onClick={() => this.addCond('dientich')}>
                        <span className="glyphicon glyphicon-ok"></span>
                    </button>
                break
            default:
                nav = this.state.item.map( (value, index) => 
                    <button key={index} onClick={() => this.changeDisplayStatus(value.id)}>
                        {value.name}
                    </button>
                , this)
                break
        }
        ////////////////////////////////////////////////////////////////////////////////////////

        return (
            <div className="panel panel-default">

                <div className="panel-heading" id="search">
                    <div className="input-group">
                        <input type="text" className="form-control" placeholder="Tìm kiếm" name="timKiem"
                        onSubmit={() => this.addCond('ten')}/>
                        <div className="input-group-btn">
                            <button className="btn btn-default" type="submit"
                                onClick={() => this.addCond('ten')}>
                                <i className="glyphicon glyphicon-search"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div className="panel-heading" id='filter'>
                    {nav}
                    {giaTien}
                    {dienTich}
                    {diaPhuong}
                    {ok}
                </div>

                <div className="panel-body" id="filter-conditional">
                    {
                        this.state.filterCond.map((value, index) =>
                            <FilterConditional key={index} name={value.name}
                            remove={() => this.removeCond(index)} />
                        , this)
                    }
                </div>
            </div>
        )
    }
}

let test = {
    filterCond: [
        { type: 'ten', value: 'vũ', name: 'vũ' }, 
        { 
            type: 'giatien', 
            value: 3000000, 
            name: '1 000 000 - 2 000 000',
            min: 1000000, 
            max: 2000000
        }, 
        { 
            type: 'dientich', 
            value: 10, 
            name: '<= 10 m',
            min: 0,
            max: 10
        },
        {
            type: 'diaphuong',
            value: null, 
            name: 'TP Đà Nẵng - Quận Hải Châu - Phường Hòa Cường Bắc',
            tinh: 'TP Đà Nẵng',
            quan: 'Quận Hải Châu',
            phuong: 'Phường Hòa Cường Bắc'
        }
    ]
}