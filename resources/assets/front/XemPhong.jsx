import React from 'react'
import ReactDom from 'react-dom'
import {XemPhong, DuyetPhong} from './ComponentXemPhong'

/** Render App
 */
ReactDom.render(
    <DuyetPhong status={window.cND} phongDuyet={window.phongDuyet}/>,
    document.getElementById("ForCTV")
)
ReactDom.render(
    <XemPhong />,
    document.getElementById("dat-cho-react")
)