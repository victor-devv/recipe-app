<div class="text-center">
    @if(session()->has('success'))
    <div data-notify="container" class="col-11 col-md-4 alert alert-success alert-with-icon animated fadeInDown alert-dismissible" role="alert" data-notify-position="top-right" style="display: inline-block; margin: 15px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; right: 20px;">
        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -9px; z-index: 1033;" data-dismiss="alert"><i class="material-icons">close</i></button><i data-notify="icon" class="material-icons">add_alert</i><span data-notify="title"></span> <span data-notify="message">{{ session()->get('success') }}</span><a href="#" target="_blank" data-notify="url"></a>
    </div>
    @endif
    @if(session()->has('failure'))
    <div data-notify="container" class="col-11 col-md-4 alert alert-danger alert-with-icon animated fadeInDown alert-dismissible" role="alert" data-notify-position="top-right" style="display: inline-block; margin: 15px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; right: 20px;"><button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -9px; z-index: 1033;" data-dismiss="alert"><i class="material-icons">close</i></button><i data-notify="icon" class="material-icons">add_alert</i><span data-notify="title"></span> <span data-notify="message">{{ session()->get('failure') }}</span><a href="#" target="_blank" data-notify="url"></a></div>

    @endif

</div>

