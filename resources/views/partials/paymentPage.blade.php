{{-- <!-- Payment page start here -->

<div class="container mx-auto main-container rounded-3 p-2">
    <div class="row ">
        <div class="col text-center">
            <h1 class="mb-3 mt-2 fw-bold">Apply</h1>
        </div>
    </div>
    <div class="row text-center  mx-auto">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis earum accusamus omnis. Culpa libero porro
            temporibus aut eos ut perspiciatis aspernatur ipsa praesentium, pariatur, qui hic minima aliquam debitis
            accusantium!</p>
    </div>
    <div class="container text-center row  mx-auto  rounded-2 text-center text-sm-start mt-sm-4">
        <div class="col">Fees: <span class="fw-bold fs-4 bg-danger text-light p-1 rounded-1">1200$</span>/ year
        </div>
    </div>
    <div class="row fw-bold  mx-auto">
        <div class="col">
            <p class="fst-italic mt-3 text-start mt-5 ">(Please select your payment method)</p>
        </div>
    </div>
    <!-- payment methode section -->



    <form action="" class="mx-auto">


        <div class="row d-flex p-2 mx-auto ">

            <div class="col-sm-5 form-check payment-selection   ">
                <input class="form-check-input" type="radio" name="payment-choices" id="cards-payment" checked>
                <label class="form-check-label" for="cards-payment">
                    <img src="{{ asset('images/Group 337.png') }}" alt="">
</label>
</div>
<div class="col-sm-5 form-check payment-selection ">
  <input class="form-check-input" type="radio" name="payment-choices" id="paypal-payment">
  <label class="form-check-label" for="paypal-payment">
    <img src="{{ asset('images/Group 338.png') }}" alt="">

  </label>
</div>

</div>

<div class="container payment-form">


  <div class="row mt-md-3 px-5">

    <div class=" col-sm-8">

      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" required placeholder="full Name">
      </div>
    </div>
    <div class=" col-5 col-sm-4">

      <div class="mb-3">
        <label for="CVV" class="form-label">CVV</label>
        <input type="text" class="form-control" id="CVV" required placeholder="CVV">
      </div>
    </div>

  </div>
  <div class="row mt-md-3 px-5">

    <div class="col-12 col-sm-8">

      <div class="mb-3">
        <label for="card-number" class="form-label">Card Number</label>
        <input type="text" class="form-control" id="card-number" required placeholder="*********">
      </div>
    </div>
    <div class="col-5 col-sm-4">

      <div class="mb-3">
        <label for="date" class="form-label">Expiry Date</label>

        <input type="date" class="form-control" id="date" required placeholder="MM/DD/YYYY">
      </div>
    </div>
    <p>(<span class="text-danger">*</span> required)</p>

  </div>
  <div class="row">
    <button type="submit" class="btn btn-primary d-inline-block w-25 mx-auto fw-bold my-3">Pay</button>
  </div>

</div>

</form>
</div>
</div>

<!-- Payment page ends here --> --}}



{{-- ======++++++++============= ======++++++++============= ======++++++++=============
     ======++++++++=============
      ======++++++++=============
       --}}

{{-- <html lang="en">
<head>
<meta charset="UTF-8">
<link rel="stylesheet"
  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
  integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7"
  crossorigin="anonymous">
<link rel="stylesheet"
  href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

</head>

<body> --}}

<div class="container mx-auto main-container rounded-3 p-2 ">
  <div class="container mx-auto main-container rounded-3 p-2">
    <div class="row ">
      <div class="col text-center">
        <h1 class="mb-3 mt-2 fw-bold mission-typo">Apply to location chapter</h1>
      </div>
    </div>
    <div class="row text-center  mx-auto">
      <p><strong>{{ Auth::user()->name }}</strong> please continue with payment process for procedding your applications</p>
    </div>
    <div class="container text-center row  mx-auto  rounded-2 text-center text-sm-start mt-sm-4">
      <div class="col">Fees: <span class="fw-bold fs-4 bg-danger text-light p-1 rounded-1">1200$</span>/ year
      </div>
    </div>

  </div>
  {{-- <h3>{{ Auth::user()->name }} please continue with your payment process</h3> --}}
  <div class='row '>
    <div class='col-md-3'></div>
    <div class='col-md-6'>
      <script src='https://js.stripe.com/v2/' type='text/javascript'></script>
      <form accept-charset="UTF-8" action="/payment" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="pk_test_51MPxP9Ejah8oK98XAod2T6KqzhTszWFtAvwQEK9c3skXQo0vpii8M3QC3qpvemFZ8gzHpk6OcDGjBkOo3EkJld3z00Ia5n1XmB" id="payment-form" method="post">
        @csrf
        <div class="container payment-form">


          {{-- <div class="row mt-md-3 px-5"> --}}
          {{ Auth::user()->id }}
          <div class=" row">

            <div class="mb-3">
              <label for="name" class="form-label">Your name</label>
              <input type="text" class="form-control" name="name" id="name" disabled value="{{ Auth::user()->name }}">
            </div>
          </div>

          <div class=" row">

            <div class="mb-3">
              <label for="name" class="form-label">Your Email</label>
              <input type="text" class="form-control" name="email" id="email" disabled value="{{ Auth::user()->email }}">
            </div>
          </div>

          <div class=" row">

            <div class="mb-3">
              <label for="name" class="form-label">Fees</label>
              <input type="text" class="form-control" name="fees" id="fees" disabled value="1200$">
            </div>
          </div>

          <div class=" row">

            <div class="mb-3">
              <label for="name" class="form-label">Card holder name</label>
              <input type="text" class="form-control" name="card_holder_name" id="name" required placeholder="full Name">
            </div>
          </div>
          <div class=" row">
            <div class="mb-3">
              <label for="card-number" class="form-label">Card Number</label>
              <input type="text" class="form-control card-number" id="card-number" required placeholder="*********">
            </div>


          </div>

          {{-- </div> --}}
          <div class="row mt-md-3 ">

            <div class="col-4 ">

              <div class="mb-3 ">
                <label for="CVV" class="form-label">CVV</label>
                <input type="text" class="form-control card-cvc" size="4" id="CVV" name="cvv" required placeholder="CVV">
              </div>
            </div>
            <div class="col-4 ">

              <div class="mb-3 ">
                <label for="expiration" class="form-label">Expiration</label>

                <input type="text" class="form-control card-expiry-month" name="expiration" placeholder="Month" size="2" id="expiration" required>
              </div>
            </div>
            <div class="col-4 ">

              <div class="mb-3 ">
                <label for="year" class="form-label">Year</label>

                <input type="text" class="form-control card-expiry-year" name="year" placeholder="Year" size="4" id="year" required>
              </div>
            </div>
            {{-- <p>(<span class="text-danger">*</span> required)</p> --}}

          </div>
          <div class="row">
            <button type="submit" class="btn btn-primary d-inline-block w-25 mx-auto fw-bold my-3 submit-button" style="background: blue">Pay</button>
          </div>

        </div>
        {{-- <div class='form-row'>
            <div class='col-xs-12 form-group required'>
              <label class='control-label'>Card Holder Name</label> <input
                class='form-control' size='4' type='text' name="card_holder_name" disabled value="{{ Auth::user()->name }}" placeholder="Enter Card Holder Name">
    </div>
  </div>

  <div class='form-row'>
    <div class='col-xs-12 form-group required'>
      <label class='control-label'>Card Holder Name</label> <input class='form-control' size='4' type='text' name="card_holder_email" disabled value="{{ Auth::user()->email }}" placeholder="Enter Card Holder Name">
    </div>
  </div>

  <div class='form-row'>
    <div class='col-xs-12 form-group card required'>
      <label class='control-label'>Card Number</label> <input autocomplete='off' class='form-control card-number' size='20' type='text' placeholder="Enter Card number">
    </div>
  </div>
  <div class='form-row'>
    <div class='col-xs-4 form-group cvc required'>
      <label class='control-label'>CVC</label> <input autocomplete='off' class='form-control card-cvc' placeholder='CVV' size='4' type='text'>
    </div>
    <div class='col-xs-4 form-group expiration required'>
      <label class='control-label'>Expiration</label> <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
    </div>
    <div class='col-xs-4 form-group expiration required'>
      <label class='control-label'>YEAR</label> <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
    </div>
  </div>
  <div class='form-row'>
    <div class='col-md-12'>
      <div class='form-control total btn btn-info'>
        Total: <span class='amount'>$300</span>
      </div>
    </div>
  </div>
  <div class='form-row'>
    <div class='col-md-12 form-group'>
      <button class='form-control btn btn-primary submit-button' type='submit' style="margin-top: 10px;">Confirm</button>
    </div>
  </div>
  <div class='form-row'>
    <div class='col-md-12 error form-group hide'>
      <div class='alert-danger alert'>Please correct the errors and try
        again.</div>
    </div>
  </div> --}}
  </form>
  @if ((Session::has('success-message')))
  <div class="alert alert-success col-md-12">{{
          Session::get('success-message') }}</div>
  @endif @if ((Session::has('fail-message')))
  <div class="alert alert-danger col-md-12">{{
          Session::get('fail-message') }}</div>
  @endif
</div>
<div class='col-md-6'></div>
</div>
</div>
<script src="https://code.jquery.com/jquery-1.12.3.min.js" integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script>
  $(function() {
    $('form.require-validation').bind('submit', function(e) {
      var $form = $(e.target).closest('form'),
        inputSelector = ['input[type=email]', 'input[type=password]',
          'input[type=text]', 'input[type=file]',
          'textarea'
        ].join(', '),
        $inputs = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid = true;

      $errorMessage.addClass('hide');
      $('.has-error').removeClass('has-error');
      $inputs.each(function(i, el) {
        var $input = $(el);
        if ($input.val() === '') {
          $input.parent().addClass('has-error');
          $errorMessage.removeClass('hide');
          e.preventDefault(); // cancel on first error
        }
      });
    });
  });

  $(function() {
    var $form = $("#payment-form");

    $form.on('submit', function(e) {
      if (!$form.data('cc-on-file')) {
        e.preventDefault();
        Stripe.setPublishableKey($form.data('stripe-publishable-key'));
        Stripe.createToken({
          number: $('.card-number').val(),
          cvc: $('.card-cvc').val(),
          exp_month: $('.card-expiry-month').val(),
          exp_year: $('.card-expiry-year').val()
        }, stripeResponseHandler);
      }
    });

    function stripeResponseHandler(status, response) {
      if (response.error) {
        $('.error')
          .removeClass('hide')
          .find('.alert')
          .text(response.error.message);
      } else {
        // token contains id, last4, and card type
        var token = response['id'];
        // insert the token into the form so it gets submitted to the server
        $form.find('input[type=text]').empty();
        $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
        console.log(token);
        $form.get(0).submit();
      }
    }
  })
</script>
</body>

</html>