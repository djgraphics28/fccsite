@extends('layouts.registration')

@section('content')
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                {{-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> --}}
                <div class="col-lg-12">
                    <div class="p-4">
                        <div class="text-center">
                            <img src="{{ asset('FCCPI.png') }}" alt="FCCPI Logo" width="40px">
                        </div>
                        <hr>
                        <div>
                            <p class="">Hi <strong>{{ $firstName }}</strong>!</p>

                            <p class="mt-2"><strong>Welcome</strong> to the F.R.E.E. Christian Church Bugayong family! 🙏🏼✨</p>

                            <p class="mt-4"><strong>Congratulations!</strong> 🎉 You are now a registered member of our loving community of believers. We're thrilled to have you on this spiritual journey.</p>

                            <p class="mt-4">As a member, you'll enjoy inspiring events, enriching programs, and uplifting services to strengthen your faith and connect with God. Join our ministries and small groups to forge meaningful connections with like-minded individuals.</p>

                            <p class="mt-4">Stay updated on events and sermons through our newsletters and social media. Share your spiritual experiences with us and be part of our community outreach.</p>

                            <p class="mt-4">We look forward to walking alongside you on this incredible journey of faith. God's love and grace will guide and bless you abundantly. 🌟</p>

                            <a href="{{ route('registration') }}" class="btn btn-primary btn-user btn-block mt-4 mt-5">
                                REGISTER ANOTHER
                            </a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
