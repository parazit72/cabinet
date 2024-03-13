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

    <div style="max-width: 400px; margin:auto;">
        <h1 class="text-center">
            New message
        </h1>
        <p>
            <strong>Full name:</strong> {{ $data->name }}
        </p>
        <p>
            <strong>Job Title:</strong> {{ $data->job }}
        </p>
        <p>
            <strong>Email:</strong> {{ $data->email }}
        </p>
        <p>
            <strong>What are you interested in?</strong>
            <br />
            {{ $data->interested }}
        </p>

    </div>

</div>