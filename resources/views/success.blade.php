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
                            <p class="">Hi <strong>{{ $name }}</strong>!</p>

                            @if($isFirstTime)
                                <p class="mt-2"><strong>Welcome</strong> to the F.R.E.E. Christian Church Bugayong family! 🙏🏼✨</p>

                                <p class="mt-2">Your decision to join our church family brings us immense joy and excitement. We are here to support you on your spiritual journey and to celebrate every step you take in faith.</p>

                                <p class="mt-2">In this loving community, you'll find warmth, acceptance, and friendship. Whether you're seeking uplifting worship, meaningful connections, or a place to grow in God's Word, we have it all.</p>

                                <p class="mt-2">Please know that you are cherished and valued here. If you ever need anything, don't hesitate to reach out – we're here to walk alongside you.</p>

                                <p class="mt-2">Once again, welcome to F.R.E.E. Christian Church Bugayong family. Let's journey together in God's love and discover the blessings He has in store for us.</p>


                            @else
                                <p class="mt-2"><strong>Welcome</strong> to the F.R.E.E. Christian Church Bugayong family! 🙏🏼✨</p>

                                <p class="mt-4"><strong>Congratulations!</strong> 🎉 You are now a registered member of our loving community of believers. We're thrilled to have you on this spiritual journey.</p>

                                <p class="mt-4">As a member, you'll enjoy inspiring events, enriching programs, and uplifting services to strengthen your faith and connect with God. Join our ministries and small groups to forge meaningful connections with like-minded individuals.</p>

                                <p class="mt-4">Stay updated on events and sermons through our newsletters and social media. Share your spiritual experiences with us and be part of our community outreach.</p>

                                <p class="mt-4">We look forward to walking alongside you on this incredible journey of faith. God's love and grace will guide and bless you abundantly. 🌟</p>
                            @endif

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
