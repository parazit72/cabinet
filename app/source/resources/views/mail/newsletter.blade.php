<style>
.sd-header {
    text-align: center;
    background: #0b131a;
}

.text-center {
    text-align: center;
}
</style>

<div>

    <div class="sd-header" style="background: #0b131a" bgcolor="#0b131a" align="center">
        <img src="{{config('app.url')}}/assets/images/logo.png" alt="logo">
    </div>

    <h1>
        your email has been successfully registered
    </h1>

    <h5 style="line-height: 150%; font-family:tahoma,verdana,segoe,sans-serif">
        <a target="_blank" style="line-height: 150%; color: #b4b028;"
            href="{{config('app.url')}}/newsletter/unsubscribe/{{$data->token}}">
            click here to deactivate the newsletter
        </a>
    </h5>

</div>