import React from 'react'
import ReactDom from 'react-dom'
import * as Compo from './ComponentNhaTro.js'
import { MyApp } from './ComponentNhaTro.js';

// ReactDom.render(
//     <h1>Thím Khoa dận rồi nghe. Chiều chừ mới chạy được đó. <br/> Mệt quá đi à!!!!</h1>,
//     document.getElementById('container')
// )
// ReactDom.render(
//     <div>
//         <app2.Myh2 />
//         <app2.Myh3 />
//     </div>,
//     document.getElementById("con")
// )

switch(location.pathname) {
    case '/testreact':
        ReactDom.render(
            <PhongCuaToiRender>Click click</PhongCuaToiRender>,
            document.getElementById("phong-cua-toi")
        )
        console.log(location.pathname);
        break;
    default: 
        console.log("no");
        break;
}
