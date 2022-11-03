@include ('main.paymentheader');

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <style>
        .razorpay-payment-button {
            display: none;
        }
    </style>

    <div class="maincontainer">
        <div class="row">
            <div class="col-6">
                <div class="sideimg">
                    <img src="img/legal.jpg" alt="">
                </div>
            </div>
            <div class=" right col-6">
             <div class="rightwrapper">
                <div class="head text-center">
                    <h1>Growth Guide</h1>
                </div>
                <div class="icons text-center">
                    <div class="row">
                      <div class="col-sm ">
                        <img src="img/icons8-rupee-64.png" width="20%" alt="">
                        <br><span>Your money will <br>
                        be secured with <br>
                    100% refund policy</span>
                      </div>
                      <div class="col-sm">
                       <img src="img/icons8-name-tag-48.png"  width="20%" alt="">
                       <br><span>Your details will be <br>
                        protected with  <br>
                    our privacy policy</span>
                    </div>
                      <div class="col-sm">
                    <img src="img/icons8-keepass-48.png" width="20%" alt="">
                    <br><span>Secured Payment Gateway <br>
                        PAYTM ,UPI ,Net Banking <br>
                    Debit/Credit Card</span>
                </div>
                    </div>
                  </div>
                  <div class="border"></div>
                  <div class="order text-center">
                    <div class="row">
                      <div class="col-6 " style="width: 34%;">
                        <div class="mid" style="width: 80%; height: auto;">
                       <span style="float:left;padding-left: 2px;">STATUS:</span>
                        <br>
                        <span ><b>Pending for Payment</b></span>
                    </div>
                            <div>&nbsp;</div>
                            <span class="text-muted" style="padding-right: 66px;">No hidden Charges</span>
                      </div>
                      <div class="col-6 text-center " style="width:66% ;">
                        <div class="mid2" style="width: 80%; height: auto;">
                       <span  class="text-muted" style="padding-right: 14px; text-align: center;">After making the payment we will call you </span> <br>
                       <span class="text-muted" style="float: left; padding-left:14px">for the details</span>
                        <br>

                    </div>
                            <div>&nbsp;</div>
                            <!-- <div class="inner">
                            <span class="text-muted" style="padding-right: 66px;">After making the payment we will call you <br> </span>
                                <span  class="text-muted" style="float: left; ">
                                for the details</span>
                            </div> -->
                      </div>

                    </div>
                  </div>
             </div>
             <div class="payment">
                <div class="complain">
                <span><b>SERVICE:</b>
                <span>Consumer Complaint</span></span>
            </div>
            <div class="alert alert-info" role="alert">
                <table class="table">
                    <thead>
                      <tr>

                        <th scope="col">Service Price</th>
                        <th scope="col">Rs {{ $service_price }}</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>

                        <td class="text-muted">
                            18%GST
                        </td>
                        <td class="text-muted">
                            Rs {{ $service_price * 0.18 }}
                        </td>

                      </tr>
                      <tr class="bord">
                        <td >
                           <h4>Total</h4>
                        </td>
                        <td >
                            <h4>{{ $service_price * 1.18 }}</h4>
                         </td>
                      </tr>
                    </tbody>
                  </table>

            </div>
            <button class="btn btn-primary" onclick="paynow();">Pay Now</button>
            @if($message = Session::get('error'))

            <div class="alert alert-danger alert-dismissible fade in" role="alert">

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                    <span aria-hidden="true">×</span>

                </button>

                <strong>Error!</strong> {{ $message }}

            </div>

        @endif



        @if($message = Session::get('success'))


        @endif

        <form action="{{ route('razorpay.payment.store') }}" method="POST" >

            @csrf

            <script src="https://checkout.razorpay.com/v1/checkout.js"

                    data-key="{{ env('RAZORPAY_KEY') }}"

                    data-amount="{{ $service_price * 118 }}"

                    data-buttontext="Pay"

                    data-name="ItSolutionStuff.com"

                    data-description="Rozerpay"

                    data-image="https://www.itsolutionstuff.com/frontTheme/images/logo.png"

                    data-prefill.name="name"

                    data-prefill.email="email"

                    data-theme.color="#ff7529">

            </script>

        </form>


        </div>
            </div>

        </div>
    </div>

    <script>
        function paynow() {
            document.getElementsByClassName('razorpay-payment-button')[0].click();
        }
    </script>


@include ('main.footer');
{{-- </body>
</html> --}}
