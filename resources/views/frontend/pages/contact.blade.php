@extends('frontend.layout.layout')
@section('content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="{{route('anasayfa')}}">Anasayfa</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">İletişim</strong></div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="h3 mb-3 text-black">{{ $label->form_title ?? 'İletişim' }}</h2>
                </div>
                <div class="col-md-7">

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Kapat">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif



                    <form action="{{ route('iletisim.gonder') }}" method="POST">
                        @csrf

                        <div class="p-3 p-lg-5 border">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="c_fname" class="text-black">{{ $label->name_label ?? 'İsim' }}<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_fname" name="c_fname">
                                </div>
                                <div class="col-md-6">
                                    <label for="c_lname" class="text-black">{{ $label->surname_label ?? 'Soyisim' }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_lname" name="c_lname">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="c_email" class="text-black">{{ $label->email_label ?? 'Email' }} <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="c_email" name="c_email" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="c_subject" class="text-black">{{ $label->subject_label ?? 'Konu' }}</label>
                                    <input type="text" class="form-control" id="c_subject" name="c_subject">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="c_message" class="text-black">{{ $label->message_label ?? 'Mesaj' }}</label>
                                    <textarea name="c_message" id="c_message" cols="30" rows="7" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <input type="submit" class="btn btn-primary btn-lg btn-block" value={{ $label->submit_button_label ?? 'Mesaj Gönder' }}>
                                </div>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="col-md-5 ml-auto">
                    <div class="p-4 border mb-3">
                        <span class="d-block text-primary h6 text-uppercase">Kütahya</span>
                        <p class="mb-0">Kütahya,Türkiye</p>
                        <iframe
                            class="embed-responsive-item"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48987.880850056825!2d29.950103508509627!3d39.42394499272082!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x409da4a7d804fbf9%3A0x5633dd1f4c10f1c3!2zS8O8dGFoeWE!5e0!3m2!1str!2str!4v1624905641234!5m2!1str!2str"
                            width="100%"
                            height="250"
                            style="border:0 ; border-radius: 15px;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
