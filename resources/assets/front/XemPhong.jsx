import React from 'react'
import ReactDom from 'react-dom'
import axios from 'axios'

/** Component
 */
function XacNhan(props) {
    return (
        <div id="xac-nhan" className="modal fade" role="dialog">
            <div className="modal-dialog">

                <div className="modal-content">
                    <div className="modal-header">
                        <button type="button" className="close" data-dismiss="modal">&times;</button>
                        <h4 className="modal-title">Đăng ký đặt chỗ</h4>
                    </div>
                    <div className="modal-body">
                        <form data-toggle="validator" role="form">
                            <div className="form-group">
                                <label htmlFor='maXacNhan'>Nhập mã xác nhận nhận được qua tin nhắn </label>
                                <input type='text' id='maXacNhan' name='maXacNhan' className='form-control'
                                data-error='không được bỏ trống' required></input>
                                <div id="thongbaoxacnhan" className="help-block with-errors" style={{whiteSpace: 'pre-line'}}></div>
                            </div>
                        </form>
                    </div>
                    <div className="modal-footer">
                        <button type="button" className="btn btn-default" data-dismiss="modal" id="thayDoi">Thay đổi số điện thoại</button>
                        <button type="button" className='btn btn-success my-btn-success' id="xacNhan">Xác nhận</button>
                        <button type="button" className="btn btn-default" data-dismiss="modal">Đóng lại</button>
                    </div>
                </div>

            </div>
        </div>
    )
}

function ThongBao(props) {
    return (
        <div id="thong-bao" className="modal fade" role="dialog">
            <div className="modal-dialog">

                <div className="modal-content">
                    <div className="modal-header">
                        <button type="button" className="close" data-dismiss="modal">&times;</button>
                        <h4 className="modal-title">Đăng ký đặt chỗ</h4>
                    </div>
                    <div className="modal-body">
                        <span></span>
                    </div>
                    <div className="modal-footer">
                        <button type="button" className="btn btn-default" data-dismiss="modal">Đóng lại</button>
                    </div>
                </div>

            </div>
        </div>
    )
}

/** Class
 */
class DatCho extends React.Component {

    constructor(props) {
        super(props)
        this.huyBo = this.huyBo.bind(this)
    }

    huyBo() {
        $("#sdtKhachHang").val('')
    }

    render() {
        return (
            <div id="dat-cho" className="modal fade" role="dialog">
                <div className="modal-dialog">

                    <div className="modal-content">
                        <div className="modal-header">
                            <button type="button" className="close" data-dismiss="modal">&times;</button>
                            <h4 className="modal-title">Đăng ký đặt chỗ</h4>
                        </div>
                        <div className="modal-body">
                            <form data-toggle="validator" role="form">
                                <div className="form-group">
                                    <label htmlFor="sdtKhachHang">Nhập số điện thoại của bạn</label>
                                    <input type="number" id="sdtKhachHang" name="sdtKhachHang" className='form-control'
                                        data-error='không được bỏ trống' required
                                        data-remote-error="Số điện thoại đang chờ liên hệ. \nVui lòng chờ 5 phút hoặc sử dụng số điện thoại khác."
                                        data-remote='/KhachHang/CheckSDT'/>
                                    <div className="help-block with-errors" style={{whiteSpace: 'pre-line'}}>Lưu ý nếu đặt chỗ thành công, số điện thoại của bạn sẽ bị khóa 5 phút</div>
                                </div>
                            </form>
                        </div>
                        <div className="modal-footer">
                            <button type="button" className='btn btn-success my-btn-success' id="dangKy">Đăng ký</button>
                            <button type="button" className="btn btn-default" data-dismiss="modal" onClick={this.huyBo}>Hủy bỏ</button>
                        </div>
                    </div>

                </div>
            </div>
        )
    }
}

class XemPhong extends React.Component{

    constructor(props) {
        super(props)
        this.dangKy = this.dangKy.bind(this)
        this.xacNhan = this.xacNhan.bind(this)
        this.thongBao = this.thongBao.bind(this)
        this.xoaForm = this.xoaForm.bind(this)
        this.thayDoi = this.thayDoi.bind(this)
    }

    dangKy() {
        axios.post(location.origin + '/KhachHang/DangKy', {
            _token: $('meta[name="csrf-token"]').attr('content'), 
            sdtKhachHang: $("#sdtKhachHang").val()
        }).then((res) => {
            $('#dat-cho').modal('hide');
            capNhatLuotClick();
            if(res.data === 'success')
                $("#xac-nhan").modal('show');
            else
                this.thongBao(res.data)
        })
    }

    xacNhan() {
        axios.post(location.origin + '/KhachHang/XacNhan', {
            _token: $('meta[name="csrf-token"]').attr('content'), 
            sdtKhachHang: $("#sdtKhachHang").val(),
            maXacNhan: $("#maXacNhan").val(),
            maPhong: maPhong,
            chuNha: chuNha
        })
        .then( (res) => {
            if(res.data === 'success') {
                $("#xac-nhan").modal('hide')
                clickHienSo = false
                capNhatLuotClick()
                $("#maXacNhan").val(null)
                this.thongBao('Đặt chỗ thành công')
                this.xoaForm()
            }
            else { 
                $('#thongbaoxacnhan').text('Mã xác nhận không chính xác')
                $('#thongbaoxacnhan').parent().addClass('has-error has-danger')
            }
        })
    }

    thayDoi() {
        $("#xac-nhan").modal('hide')
        $("#dat-cho").modal('show')
    }

    xoaForm() {
        $("#sdtKhachHang").val('')
    }

    thongBao(notice) {
        $('#thong-bao').find('span').text(notice);
        $('#thong-bao').modal('show');
        window.setTimeout(function(){
            $('#thong-bao').modal('hide');
        }, 7000);
    }

    componentDidMount() {
        $("#dangKy").click(this.dangKy)
        $('#xacNhan').click(this.xacNhan)
        $('#thayDoi').click(this.thayDoi)
    }

    render() {
        return (
            <div>
                <DatCho />
                <XacNhan />
                <ThongBao />
            </div>
        )
    }
}

/** Render App
 */
ReactDom.render(
    <XemPhong />,
    document.getElementById("dat-cho-react")
)