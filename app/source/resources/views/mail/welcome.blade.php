<style>
.sd-header {
    text-align: center;
    background: #404873;
}

.text-center {
    text-align: center;
}
</style>
<div class="">
    <div class="sd-header" style="background: #0b131a" bgcolor="#0b131a" align="center">
        <img src="{{config('app.url')}}/assets/images/logo.png" alt="logo">
    </div>
    <br />
    <p style="max-width: 320px; margin: 20px auto;">
        Hello <span style="text-transform: capitalize">{{ $data->name }}</span>.
        <br />
        <br />
        We have received your message and will contact you as soon as possible.
    </p>
</div>