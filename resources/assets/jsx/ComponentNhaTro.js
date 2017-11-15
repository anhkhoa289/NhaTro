import React from 'react'
import ReactDOM from 'react-dom'


class PhongCuaToiItem extends React.Component {
    render() {
        const divStyle = {
            backgroundImage:'url('+this.props.backgroundImg +')',
            height: '7rem',
            width: '7rem',
        }
        return (
            <li>
                <a href={this.props.urlTo}>
                    <div className='img-nhatro'>
                        <div style={divStyle}></div>
                    </div>
                    <div className="noi-dung">
                        <div className="title">{this.props.tenPhong}</div>
                        {this.props.noiDung}
                    </div>
                </a>
            </li>
        )
    }
}

export class PhongCuaToiRender extends React.Component{
    constructor(props) {
        super(props)
        this.state = {
            mang : [ 
                {urlTo : "#", tenPhong : "Phong1", noiDung: "noidung phong", backgroundImg: "https://d2eip9sf3oo6c2.cloudfront.net/series/square_covers/000/000/049/thumb/EGH_LearnES6_Final.png?1496436434"} 
            ],
            post: "khi` khi`"
        }
        this.renderSomething = this.renderSomething.bind(this)
    }
    renderSomething() {
        let mang = this.state.mang
        mang.push(
            {
                urlTo : "dsa", 
                tenPhong : "Phong1", 
                noiDung: "noidung phong", 
                backgroundImg: "https://www.google.com.vn/images/branding/googlelogo/2x/googlelogo_color_120x44dp.png"
            }
        )
        this.setState({mang : mang})
    }
    render() {
        return (
            <ul id="PhongTroCuaToi">
                {
                    this.state.mang.map((val, index) =>
                        <PhongCuaToiItem key={index} urlTo={val.urlTo} tenPhong={val.tenPhong} 
                        noiDung={val.noiDung} backgroundImg={val.backgroundImg}/>
                    )
                }
            </ul>
        )
    }
}

