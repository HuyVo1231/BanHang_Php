<div class="container">
    <div class="row">
        <h6>Thống kê theo: <span id="text-date"></span></h6>
        <form class="d-flex">
            <div class="col-md-2">
                <p>Từ ngày: <input type="text" id="datepicker" class="form-control"></p>
            </div>
            <div class="col-md-2">
                <p>Đến ngày: <input type="text" id="datepicker2" class="form-control"></p>
            </div>

            <div class="col-md-2">
                <br><input type="button" id="buttondash" class="btn btn-primary" value="Lọc kết quả">
            </div>
            <div class="col-md-2">
                <br>
                <select class="select-date form-select">
                    <option value="365ngay">365 ngày</option>
                    <option value="7ngay"> 7 ngày</option>
                    <option value="30ngay">30 ngày</option>
                    <option value="90ngay">90 ngày</option>
                </select>
            </div>
        </form>

        <div class="col-md-12">
            <div id="elements" style="height: 300px;"></div>
        </div>

    </div>
</div>