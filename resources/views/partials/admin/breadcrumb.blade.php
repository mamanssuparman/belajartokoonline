<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="d-inline">
        <strong style="font-size: 25px"> {{ $breadcrumb1 }} </strong> &raquo; {{ $breadcrumb2 }}
    </div>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
        <button type="button" class="btn btn-warning btn-sm" onclick="history.go(-1)">
            <li class="fa fa-undo"></li> Kembali
        </button>
    </div>
</div>
