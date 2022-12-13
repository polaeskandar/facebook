@extends('template.template')
@section('content')
  <div class="card email-verification-notice">
    <div class="card-body">
      <h5 class="card-title">Please verify your email address.</h5>
      <p class="card-text">In order to complete this action, you need to verify your email address. Click the button below to send the verification link to your email.</p>
      <a id="send-verification-email-btn" class="btn btn-primary">Send email verification</a>
      <form id="send-verification-email-form" action="/email/verification-notification" method="POST">@csrf</form>
    </div>
  </div>
@endsection

