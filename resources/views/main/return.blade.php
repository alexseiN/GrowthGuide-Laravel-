<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Insure - Insurance HTML Template</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="keywords" />
  <meta content="" name="description" />

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon" />

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Poppins:wght@600;700&display=swap"
    rel="stylesheet" />

  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

  <!-- Libraries Stylesheet -->
  <link href="lib/animate/animate.min.css" rel="stylesheet" />
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/bootstrap.min.css" rel="stylesheet" />

  <!-- Template Stylesheet -->
  <link href="css/style.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/Common.css">
</head>

  <!-- Spinner Start -->
  <div id="spinner"
    class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary" role="status"></div>
  </div>
  <!-- Spinner End -->

  <!-- Topbar Start -->
  <div class="container-fluid bg-dark text-white-50 py-2 px-0 d-none d-lg-block">
    <div class="row gx-0 align-items-center">
      <div class="col-lg-7 px-5 text-start">
        <div class="h-100 d-inline-flex align-items-center me-4">
          <small class="fa fa-phone-alt me-2"></small>
          <small>+012 345 6789</small>
        </div>
        <div class="h-100 d-inline-flex align-items-center me-4">
          <small class="far fa-envelope-open me-2"></small>
          <small>info@example.com</small>
        </div>
        <div class="h-100 d-inline-flex align-items-center me-4">
          <small class="far fa-clock me-2"></small>
          <small>Mon - Fri : 09 AM - 09 PM</small>
        </div>
      </div>
      <div class="col-lg-5 px-5 text-end">
        <div class="h-100 d-inline-flex align-items-center">
          <a class="text-white-50 ms-4" href=""><i class="fab fa-facebook-f"></i></a>
          <a class="text-white-50 ms-4" href=""><i class="fab fa-twitter"></i></a>
          <a class="text-white-50 ms-4" href=""><i class="fab fa-linkedin-in"></i></a>
          <a class="text-white-50 ms-4" href=""><i class="fab fa-instagram"></i></a>
        </div>
      </div>
    </div>
  </div>
  <!-- Topbar End -->

  <!-- Navbar Start -->
  <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5">
    <a href="index.html" class="navbar-brand d-flex align-items-center">
      <h1 class="m-0">
        <img class="img-fluid me-3" src="img/icon/icon-02-primary.png" alt="" />Insure
      </h1>
    </a>
    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <div class="navbar-nav mx-auto bg-light rounded pe-4 py-3 py-lg-0">
        <a href="index.html" class="nav-item nav-link">Home</a>
        <a href="about.html" class="nav-item nav-link">About Us</a>

          <div class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Our Services</a>
        <div class="dropdown-menu bg-light border-0 m-0">
          @foreach($services as $service)
            <a href="{{ route('show.form', $service->id) }}" class="dropdown-item">{{$service->id}}
            {{$service->service_name}}</a>

                        @endforeach
                      </div>
                    </div>




        <div class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
          <div class="dropdown-menu bg-light border-0 m-0">
            <a href="feature.html" class="dropdown-item">Features</a>
            <a href="appointment.html" class="dropdown-item">Appointment</a>
            <a href="team.html" class="dropdown-item">Team Members</a>
            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
            <a href="404.html" class="dropdown-item">404 Page</a>
          </div>
        </div>
        <a href="contact.html" class="nav-item nav-link">Contact Us</a>
      </div>
    </div>
    <a href="" class="btn btn-primary px-3 d-none d-lg-block">Get A Quote</a>
  </nav>
  <!-- Navbar End -->

  <!-- Page Header Start -->
  <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <!-- <div class="container py-5">
        <h1 class="display-4 animated slideInDown mb-4 " >Services</h1>
        <nav aria-label="breadcrumb animated slideInDown">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active" aria-current="page">Services</li>
          </ol>
        </nav>
      </div> -->
  </div>
  <!-- Page Header End -->
  <div class="banner">
    <h1 style="text-align: center;">File your GST Return with ease! Your Business ,Our Responsinility</h1>
    <p style="text-align: center; margin-top:36px;margin-bottom:10px">Let India’s recommended Business Taxation expert
      file your GST Returns on Time | Digital Assistance to any Corner of the Nation</p>
  </div>
  <section class="mt-20">
    <div class="Container">
      <div class="row">
        <div class="pull-left col-md-6 col-sm-12">
          <form class="contact">
            @csrf
            <h2>GST Return Form</h2>
            <p>Submit your details here</p>
            <div class="form-group">
              <label for="exampleInputEmail1">Your Name</label>
              <input type="name" class="form-control" id="name" placeholder="Ex-Shivam">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1"> Your Email</label>
              <input type="email" class="form-control" id="email" placeholder="Ex-Shivam123@gmail.com">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Your Phone Number</label>
              <input type="phone number" class="form-control" id="" placeholder="Phone Number without (0 or +91)">
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">No. of Employees</label>
              <input type="text" class="form-control" id="" placeholder="Employees No">
            </div>
            <label for="state">State</label>
            <select class="form-select" aria-label="Default select example">
              <option selected>Select State</option>
              <option value="Andhra Pradesh">Andhra Pradesh</option>
              <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
              <option value="Arunachal Pradesh">Arunachal Pradesh</option>
              <option value="Assam">Assam</option>
              <option value="Bihar">Bihar</option>
              <option value="Chandigarh">Chandigarh</option>
              <option value="Chhattisgarh">Chhattisgarh</option>
              <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
              <option value="Daman and Diu">Daman and Diu</option>
              <option value="Delhi">Delhi</option>
              <option value="Lakshadweep">Lakshadweep</option>
              <option value="Puducherry">Puducherry</option>
              <option value="Goa">Goa</option>
              <option value="Gujarat">Gujarat</option>
              <option value="Haryana">Haryana</option>
              <option value="Himachal Pradesh">Himachal Pradesh</option>
              <option value="Jammu and Kashmir">Jammu and Kashmir</option>
              <option value="Jharkhand">Jharkhand</option>
              <option value="Karnataka">Karnataka</option>
              <option value="Kerala">Kerala</option>
              <option value="Madhya Pradesh">Madhya Pradesh</option>
              <option value="Maharashtra">Maharashtra</option>
              <option value="Manipur">Manipur</option>
              <option value="Meghalaya">Meghalaya</option>
              <option value="Mizoram">Mizoram</option>
              <option value="Nagaland">Nagaland</option>
              <option value="Odisha">Odisha</option>
              <option value="Punjab">Punjab</option>
              <option value="Rajasthan">Rajasthan</option>
              <option value="Sikkim">Sikkim</option>
              <option value="Tamil Nadu">Tamil Nadu</option>
              <option value="Telangana">Telangana</option>
              <option value="Tripura">Tripura</option>
              <option value="Uttar Pradesh">Uttar Pradesh</option>
              <option value="Uttarakhand">Uttarakhand</option>
              <option value="West Bengal">West Bengal</option>
            </select>
            <label for="file">Choose File(Optional)</label><br>
            <input type="file" id="file" name="file"><br>
            <legend>Select a Package:</legend>
            <p>Please select your favorite Web language:</p>
              <input type="radio" id="basic" name="Package" value="Basic">
              <label class="radio" for="Basic">Basic Package &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
              Rs2499</label><br>
              <input type="radio" id="Standard" name="Package" value="standard">
              <label class="radio" for="Standard">Standard Package &nbsp &nbsp &nbsp &nbsp Rs4999</label><br>
              <input type="radio" id="Premium" name="Package" value="premium">
              <label class="radio" for="Premium">Premium Package &nbsp &nbsp &nbsp &nbsp Rs7999</label>

            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">I agree to receive Updates over
                call,Email</label>
              </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
        <div class="col">
          <p class="pull-right">
            Every GST registered organization in India is legally responsible for filing a total of 26 GST return filings in a financial year. It may sound problematic to meet up the regulations but with the GST experts’ proper online guidance in Online Legal India, you would be able to complete all the needful steps with ease. The taxpayers are liable to pay the GST filings within a preset time as the Govt. of India use these returns to evaluate the entire tax liability in the country.
          </p>
          <h3>With the help of our CA expert from Online Legal India™ get your GST Return filing done in few clicks.</h3>
          <div class="pannel-heading" role="tab" id="headingOne">
            <h6 class="pannel-title">
            <a role="button">Who is Liable for GST filling
            </a>
          </h6>
        </div>
          <ul>
            <p>Any individual operating a business entity is accountable for being registered with the GST system and GST filing. The key criteria for which registered business personnel is needed to carry out GST filing:</p>
            <li>Monthly GST returns</li>
            <li>Yearly GST returns</li>
            <li>GST filing for input/purchase</li>
            <li>GST filing for output/supply</li>
          </ul>

          <div class="pannel-heading" role="tab" id="headingOne">
            <h6 class="pannel-title">
            <a role="button">Late Fees/Penalty For Failing to Filling The Return On Time
            </a>
          </h6>
        </div>
        <p class="fee">In case the taxpayer fails to file the GST returns within the specified date provided by the GST department, then taxpayer has to pay late fee along with  interest @18%. The late fee will be Rs.20 per day if it is NIL return or else Rs 50 will be levied if you fail to furnish the return within specified date. Thus, it will come around Rs.25 under the CGST and again Rs.25 under the SGST. The total amount to be paid will be Rs.50 per day. The maximum late fee can be Rs.5000. The IGST do not charge any late fees.</p>
          </div>
        </div>
      </div>
  </section>

  <!-- main start -->

  <!-- <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto" style="max-width: 500px">
                <h1 class="display-6 mb-5">
                    File your GST Return with ease ! YOur Business,Our Responsinility
                </h1>
                <p>Let India’s recommended Business Taxation Experts File your GST Returns on Time | Digital Assistance
                    to any Corner of the Nation</p>
            </div> -->
  <!-- <section class="h-100 gradient-form" style="background-color: white;">
            <div class="container py-5 h-100">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                  <div class="card rounded-3 text-black">
                    <div class="row g-0">
                      <div class="col-lg-6">
                        <div class="card-body p-md-5 mx-md-4">

                          <div class="text-center">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
                              style="width: 185px;" alt="logo">
                            <h4 class="mt-1 mb-5 pb-1">We are a Team</h4>
                          </div>

                          <form>
                            <h2>GST Return Form</h2>
                            <p>Submit your details here</p>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Your Name</label>
                                <input type="name" class="form-control" id="name" placeholder="Ex-Shivam">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Your Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Ex-Shivam123@gmail.com">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Your Phone Number</label>
                                <input type="phone number" class="form-control" id="" placeholder="Phone Number without (0 or +91)">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">No. of Employees</label>
                                <input type="text" class="form-control" id="" placeholder="Employees No">
                            </div>
                            <label for="state">State</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Select State</option>
                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                <option value="Assam">Assam</option>
                                <option value="Bihar">Bihar</option>
                                <option value="Chandigarh">Chandigarh</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
                                <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                <option value="Daman and Diu">Daman and Diu</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Lakshadweep">Lakshadweep</option>
                                <option value="Puducherry">Puducherry</option>
                                <option value="Goa">Goa</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Haryana">Haryana</option>
                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                <option value="Jharkhand">Jharkhand</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Manipur">Manipur</option>
                                <option value="Meghalaya">Meghalaya</option>
                                <option value="Mizoram">Mizoram</option>
                                <option value="Nagaland">Nagaland</option>
                                <option value="Odisha">Odisha</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Rajasthan">Rajasthan</option>
                                <option value="Sikkim">Sikkim</option>
                                <option value="Tamil Nadu">Tamil Nadu</option>
                                <option value="Telangana">Telangana</option>
                                <option value="Tripura">Tripura</option>
                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                <option value="Uttarakhand">Uttarakhand</option>
                                <option value="West Bengal">West Bengal</option>
                            </select>
                            <label for="file">Choose File(Optional)</label><br>
                            <input type="file" id="file" name="file"><br>
                                <legend>Select a Package:</legend>
                                <p>Please select your favorite Web language:</p>
                                  <input type="radio" id="basic" name="Package" value="Basic">
                                  <label  class="radio" for="Basic">Basic Package &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  Rs2499</label><br>
                                  <input type="radio" id="Standard" name="Package" value="standard">
                                  <label class="radio" for="Standard">Standard Package &nbsp &nbsp &nbsp &nbsp Rs4999</label><br>
                                  <input type="radio" id="Premium" name="Package" value="premium">
                                  <label  class="radio" for="Premium">Premium Package &nbsp &nbsp &nbsp &nbsp Rs7999</label>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">I agree to receive Updates over
                                    call,Email</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>

                          </form>

                        </div>
                      </div>
                      <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                        <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                          <h4 class="mb-4">We are more than just a company</h4>
                          <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
    </div> -->



  <!-- Service Start -->
  <div class="container-xxl py-5">
    <div class="container">
      <div class="text-center mx-auto" style="max-width: 500px">
        <h1 class="display-6 mb-5">
          Documents Required
        </h1>
      </div>
      <div class="row g-4 justify-content-center">
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
          <div class="service-item rounded h-100 p-5">
            <div class="d-flex align-items-center ms-n5 mb-4">
              <div class="service-icon flex-shrink-0 bg-primary rounded-end me-4">
                <img class="img-fluid" src="img/icon/icon-10-light.png" alt="" />
              </div>
              <h4 class="mb-0">GST Registration</h4>
            </div>
            <p class="mb-4">
              Aliqu diam amet eos erat ipsum et lorem et sit, sed stet lorem
              sit clita duo justo erat amet
            </p>
            <a class="btn btn-light px-3" href="">Click Here</a>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
          <div class="service-item rounded h-100 p-5">
            <div class="d-flex align-items-center ms-n5 mb-4">
              <div class="service-icon flex-shrink-0 bg-primary rounded-end me-4">
                <img class="img-fluid" src="img/icon/icon-01-light.png" alt="" />
              </div>
              <h4 class="mb-0">GST Return Filing</h4>
            </div>
            <p class="mb-4">
              Aliqu diam amet eos erat ipsum et lorem et sit, sed stet lorem
              sit clita duo justo erat amet
            </p>
            <a class="btn btn-light px-3" href="">Click Here</a>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
          <div class="service-item rounded h-100 p-5">
            <div class="d-flex align-items-center ms-n5 mb-4">
              <div class="service-icon flex-shrink-0 bg-primary rounded-end me-4">
                <img class="img-fluid" src="img/icon/icon-05-light.png" alt="" />
              </div>
              <h4 class="mb-0">GST NIL Return Filing</h4>
            </div>
            <p class="mb-4">
              Aliqu diam amet eos erat ipsum et lorem et sit, sed stet lorem
              sit clita duo justo erat amet
            </p>
            <a class="btn btn-light px-3" href="">Click Here</a>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
          <div class="service-item rounded h-100 p-5">
            <div class="d-flex align-items-center ms-n5 mb-4">
              <div class="service-icon flex-shrink-0 bg-primary rounded-end me-4">
                <img class="img-fluid" src="img/icon/icon-08-light.png" alt="" />
              </div>
              <h4 class="mb-0">FSSAI Registration</h4>
            </div>
            <p class="mb-4">
              Aliqu diam amet eos erat ipsum et lorem et sit, sed stet lorem
              sit clita duo justo erat amet
            </p>
            <a class="btn btn-light px-3" href="">Read More</a>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
          <div class="service-item rounded h-100 p-5">
            <div class="d-flex align-items-center ms-n5 mb-4">
              <div class="service-icon flex-shrink-0 bg-primary rounded-end me-4">
                <img class="img-fluid" src="img/icon/icon-07-light.png" alt="" />
              </div>
              <h4 class="mb-0">Import Export Code Registration</h4>
            </div>
            <p class="mb-4">
              Aliqu diam amet eos erat ipsum et lorem et sit, sed stet lorem
              sit clita duo justo erat amet
            </p>
            <a class="btn btn-light px-3" href="">Read More</a>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
          <div class="service-item rounded h-100 p-5">
            <div class="d-flex align-items-center ms-n5 mb-4">
              <div class="service-icon flex-shrink-0 bg-primary rounded-end me-4">
                <img class="img-fluid" src="img/icon/icon-06-light.png" alt="" />
              </div>
              <h4 class="mb-0">Trademark Registration Online</h4>
            </div>
            <p class="mb-4">
              Aliqu diam amet eos erat ipsum et lorem et sit, sed stet lorem
              sit clita duo justo erat amet
            </p>
            <a class="btn btn-light px-3" href="">Read More</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Service End -->
  <!-- ======= Pricing Section ======= -->
  <section id="pricing" class="pricing">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h3>Package</h3>
        <br>
      </header>

      <div class="row gy-4" data-aos="fade-left">

        <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
          <div class="box">
            <h3 style="color: #07d5c0;">Basic Plan</h3>
            <p class="basic text-align-center">3 month GST return Filing</p>
            <div class="price"><sup>$</sup>0<span> / mo</span></div>
            <img src="assets/img/pricing-free.png" class="img-fluid" alt="">
            <ul>

              <li> Dedicated GST expert</li>
              <li> Return Filing</li>
              <li>GSTR-3B Return Filing</li>
              <li>Input Tax Credit Reconciliation</li>
              <li>Data modeling in Excel & Tally</li>
              <li>Phone, Chat & Email Support</li>
            </ul>
            <a href="#" class="btn-buy">Buy Now</a>
          </div>
        </div>

        <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
          <div class="box">
            <span class="featured">Featured</span>
            <h3 style="color: #65c600;">Standard Plan</h3>
            <div class="price"><sup>$</sup>19<span> / mo</span></div>
            <img src="assets/img/pricing-starter.png" class="img-fluid" alt="">
            <ul>
              <li> Dedicated GST expert</li>
              <li> Return Filing</li>
              <li>GSTR-3B Return Filing</li>
              <li>Input Tax Credit Reconciliation</li>
              <li>Data modeling in Excel & Tally</li>
              <li>Phone, Chat & Email Support</li>
            </ul>
            <a href="#" class="btn-buy">Buy Now</a>
          </div>
        </div>

        <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
          <div class="box">
            <h3 style="color: #ff901c;">Business Plan</h3>
            <div class="price"><sup>$</sup>29<span> / mo</span></div>
            <img src="assets/img/pricing-business.png" class="img-fluid" alt="">
            <ul>
              <li> Dedicated GST expert</li>
              <li> Return Filing</li>
              <li>GSTR-3B Return Filing</li>
              <li>Input Tax Credit Reconciliation</li>
              <li>Data modeling in Excel & Tally</li>
              <li>Phone, Chat & Email Support</li>
            </ul>
            <a href="#" class="btn-buy">Buy Now</a>
          </div>
        </div>

        <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="400">
          <div class="box">
            <h3 style="color: #ff0071;">Premium Plan</h3>
            <div class="price"><sup>$</sup>49<span> / mo</span></div>
            <img src="assets/img/pricing-ultimate.png" class="img-fluid" alt="">
            <ul>
              <li> Dedicated GST expert</li>
              <li> Return Filing</li>
              <li>GSTR-3B Return Filing</li>
              <li>Input Tax Credit Reconciliation</li>
              <li>Data modeling in Excel & Tally</li>
              <li>Phone, Chat & Email Support</li>
            </ul>
            <a href="#" class="btn-buy">Buy Now</a>
          </div>
        </div>

      </div>

    </div>

  </section>
  <!--pricing section end-->




  <!-- ======= F.A.Q Section ======= -->
  <section id="faq" class="faq">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>F.A.Q</h2>
        <p>Frequently Asked Questions</p>
      </header>

      <div class="row">
        <div class="col-lg-6">
          <!-- F.A.Q List 1-->
          <div class="accordion accordion-flush" id="faqlist1">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#faq-content-1">
                  Non consectetur a erat nam at lectus urna duis?
                </button>
              </h2>
              <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                <div class="accordion-body">
                  Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur
                  gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#faq-content-2">
                  Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?
                </button>
              </h2>
              <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                <div class="accordion-body">
                  Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id
                  donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit
                  ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#faq-content-3">
                  Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi?
                </button>
              </h2>
              <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                <div class="accordion-body">
                  Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum
                  integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt.
                  Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi
                  quis
                </div>
              </div>
            </div>

          </div>
        </div>

        <div class="col-lg-6">

          <!-- F.A.Q List 2-->
          <div class="accordion accordion-flush" id="faqlist2">

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#faq2-content-1">
                  Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?
                </button>
              </h2>
              <div id="faq2-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                <div class="accordion-body">
                  Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id
                  donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit
                  ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#faq2-content-2">
                  Tempus quam pellentesque nec nam aliquam sem et tortor consequat?
                </button>
              </h2>
              <div id="faq2-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                <div class="accordion-body">
                  Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc
                  vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus
                  gravida quis blandit turpis cursus in
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#faq2-content-3">
                  Varius vel pharetra vel turpis nunc eget lorem dolor?
                </button>
              </h2>
              <div id="faq2-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                <div class="accordion-body">
                  Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada
                  nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis
                  tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat commodo sed egestas egestas
                  fringilla phasellus faucibus. Nibh tellus molestie nunc non blandit massa enim nec.
                </div>
              </div>
            </div>

          </div>
        </div>

      </div>

    </div>

  </section><!-- End F.A.Q Section -->

  <!-- Footer Start -->
  <div class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
      <div class="row g-5">
        <div class="col-lg-3 col-md-6">
          <h1 class="text-white mb-4">
            <img class="img-fluid me-3" src="img/icon/icon-02-light.png" alt="" />Insure
          </h1>
          <p>
            Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat
            ipsum et lorem et sit, sed stet lorem sit clita
          </p>
          <div class="d-flex pt-2">
            <a class="btn btn-square me-1" href=""><i class="fab fa-twitter"></i></a>
            <a class="btn btn-square me-1" href=""><i class="fab fa-facebook-f"></i></a>
            <a class="btn btn-square me-1" href=""><i class="fab fa-youtube"></i></a>
            <a class="btn btn-square me-0" href=""><i class="fab fa-linkedin-in"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <h5 class="text-light mb-4">Address</h5>
          <p>
            <i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA
          </p>
          <p><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
          <p><i class="fa fa-envelope me-3"></i>info@example.com</p>
        </div>
        <div class="col-lg-3 col-md-6">
          <h5 class="text-light mb-4">Quick Links</h5>
          <a class="btn btn-link" href="">About Us</a>
          <a class="btn btn-link" href="">Contact Us</a>
          <a class="btn btn-link" href="">Our Services</a>
          <a class="btn btn-link" href="">Terms & Condition</a>
          <a class="btn btn-link" href="">Support</a>
        </div>
        <div class="col-lg-3 col-md-6">
          <h5 class="text-light mb-4">Newsletter</h5>
          <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
          <div class="position-relative mx-auto" style="max-width: 400px">
            <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email" />
            <button type="button" class="btn btn-secondary py-2 position-absolute top-0 end-0 mt-2 me-2">
              SignUp
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid copyright">
      <div class="container">
        <div class="row">
          <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
            &copy; <a href="#">Your Site Name</a>, All Right Reserved.
          </div>
          <div class="col-md-6 text-center text-md-end">
            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
            Designed By <a href="https://htmlcodex.com">HTML Codex</a>
            <br />Distributed By:
            <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer End -->

  <!-- Back to Top -->
  <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>

  <!-- Template Javascript -->
  <script src="js/main.js"></script>
  </body>

</html>

