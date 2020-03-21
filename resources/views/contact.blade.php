@extends('layouts.front')

@section('title')
    Contact page
@endsection


@section('content')
@component('partials.breadcrumb', ['breadcrumb' => 'Contact'])
    
@endcomponent
        <!-- ##### Contact Area Start ##### -->
    <section class="contact-area section-padding-100">
        <div class="container">
            <div class="row">

                <!-- Contact Form Area -->
                <div class="col-12">
                    <h4 class="mb-70">Get In Touch</h4>

                    <!-- Contact Form -->
                    <div class="contact-form-area mb-100">
                        <form action="" method="post">
                            @csrf

                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <input name="Name" id="name" type="text" class="form-control"  placeholder="Name*" value="{{ session('user') ? session('user')->Username : "" }}" required {{ session('user') ? "readonly" : "" }}>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <input name="Email" id="email" type="email" class="form-control" placeholder="Email*" value="{{ session('user') ? session('user')->Email : "" }}" required {{ session('user') ? "readonly" : "" }}>
                                </div>
                                <div class="col-12">
                                    <input name="Subject" type="text" class="form-control" id="subject" placeholder="Subject" required value="Naslov">
                                </div>
                                <div class="col-12">
                                    <textarea name="Message" id="message" class="form-control"  cols="30" rows="10" placeholder="Message" required >Sadrzaj</textarea>
                                </div>
                                <div class="col-12">
                                    <button id="btnSendEmail" class="btn egames-btn w-100" type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->
@endsection

@section('script')
    <script src="{{ asset('js/_contact.js') }}"></script>
@endsection