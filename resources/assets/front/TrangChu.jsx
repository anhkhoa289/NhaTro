import React from 'react'
import ReactDom from 'react-dom'
import axios from 'axios'
import { SearchPanel } from './ComponentTrangChu.jsx';

class Result extends React.Component {

    constructor(props) {
        super(props)

        this.getItemPT = this.getItemPT.bind(this)
        this.updateItemPT = this.updateItemPT.bind(this)

        this.state = {
            itemPT: [],
            skip: 0,
            remaining: true,
            cond: []
        }

        this.getItemPT();
    }
    getItemPT() {
        axios.post('TrangChuReact', {
            _token: $('meta[name="csrf-token"]').attr('content'),
            skip: this.state.skip,
            cond: this.state.cond
        }).then((res) => {
            let itemPT = this.state.itemPT
            res.data.result.map((value) => itemPT.push(value))

            let remaining = true
            if(res.data.result.length < 5) remaining = false
            this.setState({itemPT, remaining, skip: this.state.itemPT.length})
        })
    }
    updateItemPT(cond) {
        console.log()
        this.setState({remaining: true, itemPT: [], skip: 0, cond: cond}, () => {this.getItemPT()})
    }
    componentDidMount() {
        window.addEventListener('scroll', () => {
            if(this.state.remaining)
                if(($(window).scrollTop() + $(window).height() == $(document).height()))
                    this.getItemPT()
        })
    }
    render() {
        return (
            <div className="row">
                <div className="col-md-8 col-xs-12 result">
                    <div className="panel panel-approved panel-default">
                        <div className="panel-heading">Phòng trọ</div>
                        <div className="panel-body" id="result">
                            {
                                this.state.itemPT.map((v, i) => {
                                    return (
                                        <a className="bordering" href={'Phong/' + v.maPhong} key={i}
                                            style={(i == 0) ? {border: 0 + 'px'} : null}>
                                            <div className="row">
                                                <div className="col-md-2 col-xs-12 img-nhatro">
                                                    <div style={{backgroundImage: 'url(storage/img/'+ v.pathImg + ')'}}></div>
                                                </div>

                                                <div className="col-md-10 col-xs-12">{v.tenPhong}</div>
                                                <div className="col-md-10 col-xs-12">Giá: {v.gia}</div>
                                                <div className="col-md-10 col-xs-12 img-ctv">
                                                    <span href="#">
                                                        {(v.tinhTrangDuyet == 1) ? 'Da Duyet' : 'Chua Duyet'}
                                                        {/* <img src="{{asset('storage/img/'.$item->avatar)}}" alt="{{$item->ten}}" /> */}
                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                    )
                                })
                            }
                        </div>
                    </div>
                </div>

                <div className="col-md-4" id="search-panel">
                    <SearchPanel giaTien={priceList} dienTich={areaList} capNhatDanhSach={(x) => this.updateItemPT(x)}/>
                </div>

            </div>
        )
    }
}



/** Render App 
 * 
*/
let priceList = [
    { value: 2000000, name: '< 1 000 000', min: 0, max: 1000000},
    { value: 3000000, name: '1 000 000 - 2 000 000', min: 1000000, max: 2000000},
    { value: 3000000, name: '2 000 000 - 3 000 000', min: 2000000, max: 3000000},
    { value: 4000000, name: '3 000 000 - 4 000 000', min: 3000000, max: 4000000},
    { value: 5000000, name: '4 000 000 - 5 000 000', min: 4000000, max: 5000000},
    { value: 6000000, name: '5 000 000 - 6 000 000', min: 5000000, max: 6000000},
    { value: 7000000, name: '> 6 000 000', min: 6000000, max: 0}
]
let areaList = [
    { value: 10, name: '<= 10 m', min: 0, max: 10},
    { value: 20, name: '10 - 20 m', min: 10, max: 20},
    { value: 30, name: '20 - 30 m', min: 20, max: 30},
    { value: 40, name: '30 - 40 m', min: 30, max: 40},
    { value: 50, name: '40 - 50 m', min: 40, max: 50},
    { value: 60, name: '50 - 60 m', min: 50, max: 60},
    { value: 70, name: '> 60', min: 60, max: 0}
]

ReactDom.render(
    <Result />,
    document.getElementById('app')
)