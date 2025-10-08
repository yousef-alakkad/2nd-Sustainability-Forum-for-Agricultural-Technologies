<!doctype html>
<html lang="en" class="light-theme" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Co-Exhibitors Feedback Survey</title>
    <link rel="icon" type="image/png" href="{{ asset('public/logo.jpeg') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        body {
            font-family: 'Cairo', sans-serif;
            background-color: #f8f9fa;
            color: #2c3e50;
            background-image: url('{{ asset('public/bg1.png') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
        }

        .container {
            padding-top: 2rem;
            padding-bottom: 2rem;
        }

        .card {
            background-color: #ffffff;
            border-radius: 16px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease-in-out;
        }

        .card:hover {
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            font-size: 1.1rem;
            font-weight: 600;
        }

        .form-check-label {
            font-size: 1rem;
            font-weight: 400;
        }

        textarea.form-control,
        input.form-control {
            border-radius: 8px;
            padding: 0.75rem;
            border: 1px solid #ccc;
        }

        textarea.form-control:focus,
        input.form-control:focus {
            border-color: #7a8150;
            box-shadow: 0 0 0 0.2rem rgba(122, 129, 80, 0.25);
        }

        .btn-primary {
            background-color: #7a8150;
            border-color: #7a8150;
            padding: 0.6rem 2rem;
            font-size: 1.1rem;
            border-radius: 10px;
        }

        .btn-primary:hover {
            background-color: #5f6741;
            border-color: #5f6741;
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <div class="text-center mb-5" data-aos="fade-up">
            <img src="{{ asset('public/logo.jpeg') }}" alt="Logo" style="max-width: 250px;">
            <h2 class="fw-bold mt-3" style="color: #ecdfb2;">Co-Exhibitors Feedback Survey</h2>
            <p class="lead" style="color: #ecdfb2;">Thank you for visiting the NCPD stand! We’d love your quick
                feedback (1–2 minutes):</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="card p-4" data-aos="fade-up">

                    @if (session()->has('success'))
                        <div class="text-center p-5 bg-white rounded shadow" data-aos="fade-up">
                            <h3 class="fw-bold text-success">✅ Thank you for your valuable input.
                                Your feedback helps us improve and represent Saudi producers in the best possible way on
                                the global stage.
                                ________________________________________
                            </h3>
                        </div>
                    @else
                        {{-- @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}

                        <form method="POST" action="{{ route('partner-survey.update',$PartnerSurvey->id) }}">
                            @csrf
                            @method('PUT')
                            <!-- A. General Information -->
                            <h5 class="mt-4 mb-3">A. General Information</h5>

                            <div class="mb-3">
                                <label class="form-label">1.Company Name</label>
                                <input type="text" name="company_name" class="form-control"
                                    value="{{ $PartnerSurvey->company_name }}">
                                @error('company_name')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">2.Contact Person</label>
                                <input type="text" name="contact_person" class="form-control"
                                    value="{{ $PartnerSurvey->contact_person }}">
                                @error('contact_person')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">3.Exhibition Name & Location</label>
                                <input type="text" name="exhibition_name_location" class="form-control"
                                    value="{{ $PartnerSurvey->exhibition_name_location }}">
                                @error('exhibition_name_location')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">4.Date of Exhibition</label>
                                <input type="date" name="exhibition_date" class="form-control"
                                    value="{{ $PartnerSurvey->exhibition_date }}">
                                @error('exhibition_date')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>


                            <!-- B. Marketing & Visibility -->
                            <h5 class="mt-4 mb-3">B. Marketing & Visibility</h5>

                            <div class="mb-3">
                                <label class="form-label">1.How would you rate the overall marketing presence of the
                                    Saudi
                                    Pavilion?</label>
                                @foreach (['Excellent', 'Good', 'Fair', 'Poor', 'Very Poor'] as $option)
                                    <div class="form-check">
                                        <input type="radio" name="saudi_pavilion_marketing_rating"
                                            value="{{ $option }}" class="form-check-input"
                                            {{ $PartnerSurvey->saudi_pavilion_marketing_rating == $option ? 'checked' : '' }}>
                                        <label class="form-check-label">{{ $option }}</label>
                                    </div>
                                @endforeach
                                @error('saudi_pavilion_marketing_rating')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">2.Was the marketing material (banners, brochures, digital
                                    screens, etc.) visible, appealing, and
                                    useful?</label>
                                @foreach (['Yes, very much', 'Somewhat', 'Not really', 'Not at all'] as $option)
                                    <div class="form-check">
                                        <input type="radio" name="marketing_material_usefulness"
                                            value="{{ $option }}" class="form-check-input"
                                            {{ $PartnerSurvey->marketing_material_usefulness == $option ? 'checked' : '' }}>
                                        <label class="form-check-label">{{ $option }}</label>
                                    </div>
                                @endforeach
                                @error('marketing_material_usefulness')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">3.Do you believe the marketing efforts helped attract more
                                    visitors to your stand??</label>
                                @foreach (['Yes', 'No', 'Not sure'] as $option)
                                    <div class="form-check">
                                        <input type="radio" name="marketing_helped_attract_visitors"
                                            value="{{ $option }}" class="form-check-input"
                                            {{ $PartnerSurvey->marketing_helped_attract_visitors == $option ? 'checked' : '' }}>
                                        <label class="form-check-label">{{ $option }}</label>
                                    </div>
                                @endforeach
                                @error('marketing_helped_attract_visitors')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">4.Suggestions for improving marketing presence in future
                                    exhibitions:</label>
                                <textarea name="marketing_suggestions" class="form-control">{{ $PartnerSurvey->marketing_suggestions }}</textarea>
                                @error('marketing_suggestions')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>


                            <!-- C. Stand Design & Functionality -->
                            <h5 class="mt-4 mb-3">C. Stand Design & Functionality</h5>

                            <div class="mb-3">
                                <label class="form-label">1.How would you rate the design and aesthetics of your
                                    stand?</label>
                                @foreach (['Excellent', 'Good', 'Fair', 'Poor'] as $option)
                                    <div class="form-check">
                                        <input type="radio" name="stand_design_rating" value="{{ $option }}"
                                            class="form-check-input"
                                            {{ $PartnerSurvey->stand_design_rating == $option ? 'checked' : '' }}>
                                        <label class="form-check-label">{{ $option }}</label>
                                    </div>
                                @endforeach
                                @error('stand_design_rating')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">2.Was the stand space comfortable, professional, and suitable
                                    for your needs?</label>
                                @foreach (['Fully', 'Partially', 'Not at all'] as $option)
                                    <div class="form-check">
                                        <input type="radio" name="stand_space_suitability"
                                            value="{{ $option }}" class="form-check-input"
                                            {{ $PartnerSurvey->stand_space_suitability == $option ? 'checked' : '' }}>
                                        <label class="form-check-label">{{ $option }}</label>
                                    </div>
                                @endforeach
                                @error('stand_space_suitability')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">3.Was the stand space comfortable, professional, and suitable
                                    for your needs?</label>
                                @foreach (['Yes', 'Partially', 'No'] as $option)
                                    <div class="form-check">
                                        <input type="radio" name="stand_requirements_fulfilled"
                                            value="{{ $option }}" class="form-check-input"
                                            {{ $PartnerSurvey->stand_requirements_fulfilled == $option ? 'checked' : '' }}>
                                        <label class="form-check-label">{{ $option }}</label>
                                    </div>
                                @endforeach
                                @error('stand_requirements_fulfilled')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">4.Was the stand space comfortable, professional, and suitable
                                    for your needs?</label>
                                <textarea name="stand_improvement_suggestions" class="form-control">{{ $PartnerSurvey->stand_improvement_suggestions }}</textarea>
                                @error('stand_improvement_suggestions')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>


                            <!-- D. Logistics & Organization -->
                            <h5 class="mt-4 mb-3">D. Logistics & Organization</h5>

                            <div class="mb-3">
                                <label class="form-label">1.How do you evaluate the logistics management
                                    (transportation, product delivery, storage)?</label>
                                @foreach (['Excellent', 'Good', 'Fair', 'Poor'] as $option)
                                    <div class="form-check">
                                        <input type="radio" name="logistics_rating" value="{{ $option }}"
                                            class="form-check-input"
                                            {{ $PartnerSurvey->logistics_rating == $option ? 'checked' : '' }}>
                                        <label class="form-check-label">{{ $option }}</label>
                                    </div>
                                @endforeach
                                @error('logistics_rating')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">2.Were your materials/products delivered and handled on time
                                    and in good condition?</label>
                                @foreach (['Yes', 'No', 'Partially'] as $option)
                                    <div class="form-check">
                                        <input type="radio" name="materials_delivered_on_time"
                                            value="{{ $option }}" class="form-check-input"
                                            {{ $PartnerSurvey->materials_delivered_on_time == $option ? 'checked' : '' }}>
                                        <label class="form-check-label">{{ $option }}</label>
                                    </div>
                                @endforeach
                                @error('materials_delivered_on_time')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">3.Any issues or recommendations regarding logistics?</label>
                                <textarea name="logistics_issues" class="form-control">{{ $PartnerSurvey->logistics_issues }}</textarea>
                                @error('logistics_issues')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>


                            <!-- E. Communication & Support -->
                            <h5 class="mt-4 mb-3">E. Communication & Support</h5>

                            <div class="mb-3">
                                <label class="form-label">1.How would you rate the communication with the NCPD team
                                    before and during the exhibition?</label>
                                @foreach (['Excellent', 'Good', 'Fair', 'Poor'] as $option)
                                    <div class="form-check">
                                        <input type="radio" name="communication_rating"
                                            value="{{ $option }}" class="form-check-input"
                                            {{ $PartnerSurvey->communication_rating == $option ? 'checked' : '' }}>
                                        <label class="form-check-label">{{ $option }}</label>
                                    </div>
                                @endforeach
                                @error('communication_rating')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">2.How would you rate the communication with the NCPD team
                                    before and during the exhibition?</label>
                                @foreach (['Always', 'Sometimes', 'Rarely', 'Not at all'] as $option)
                                    <div class="form-check">
                                        <input type="radio" name="team_support_rating" value="{{ $option }}"
                                            class="form-check-input"
                                            {{ $PartnerSurvey->team_support_rating == $option ? 'checked' : '' }}>
                                        <label class="form-check-label">{{ $option }}</label>
                                    </div>
                                @endforeach
                                @error('team_support_rating')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">3.Comments about team support and coordination:</label>
                                <textarea name="support_comments" class="form-control">{{ $PartnerSurvey->support_comments }}</textarea>
                                @error('support_comments')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>


                            <!-- F. Participation Outcome -->
                            <h5 class="mt-4 mb-3">F. Participation Outcome</h5>

                            <div class="mb-3">
                                <label class="form-label">1.How successful was your participation in terms of:</label>

                                <div class="mb-2">
                                    <strong>Networking:</strong><br>
                                    @foreach (['Excellent', 'Good', 'Fair', 'Poor'] as $option)
                                        <div class="form-check form-check-inline">
                                            <input type="radio" name="networking_rating"
                                                value="{{ $option }}" class="form-check-input"
                                                {{ $PartnerSurvey->networking_rating == $option ? 'checked' : '' }}>
                                            <label class="form-check-label">{{ $option }}</label>
                                        </div>
                                    @endforeach
                                    @error('networking_rating')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-2">
                                    <strong>Sales Leads:</strong><br>
                                    @foreach (['Excellent', 'Good', 'Fair', 'Poor'] as $option)
                                        <div class="form-check form-check-inline">
                                            <input type="radio" name="sales_leads_rating"
                                                value="{{ $option }}" class="form-check-input"
                                                {{ $PartnerSurvey->sales_leads_rating == $option ? 'checked' : '' }}>
                                            <label class="form-check-label">{{ $option }}</label>
                                        </div>
                                    @endforeach
                                     @error('sales_leads_rating')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-2">
                                    <strong>Brand Exposure:</strong><br>
                                    @foreach (['Excellent', 'Good', 'Fair', 'Poor'] as $option)
                                        <div class="form-check form-check-inline">
                                            <input type="radio" name="brand_exposure_rating"
                                                value="{{ $option }}" class="form-check-input"
                                                {{ $PartnerSurvey->brand_exposure_rating == $option ? 'checked' : '' }}>
                                            <label class="form-check-label">{{ $option }}</label>
                                        </div>
                                    @endforeach
                                    @error('brand_exposure_rating')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">2.Did you achieve your business goals from this
                                    exhibition?</label>
                                @foreach (['Yes', 'Partially', 'No'] as $option)
                                    <div class="form-check">
                                        <input type="radio" name="business_goals_achieved"
                                            value="{{ $option }}" class="form-check-input"
                                            {{ $PartnerSurvey->business_goals_achieved == $option ? 'checked' : '' }}>
                                        <label class="form-check-label">{{ $option }}</label>
                                    </div>
                                @endforeach
                                @error('business_goals_achieved')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">3.What were your key outcomes (e.g., number of deals, new
                                    leads, media exposure)?</label>
                                <input type="text" name="key_outcomes" value="{{ $PartnerSurvey->key_outcomes }}"
                                    class="form-control">
                                @error('key_outcomes')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>


                            <!-- G. Suggestions & Future Planning -->
                            <h5 class="mt-4 mb-3">G. Suggestions & Future Planning</h5>

                            <div class="mb-3">
                                <label class="form-label">1.What improvements would you recommend for future
                                    exhibitions?</label>
                                <textarea name="future_improvements" class="form-control">{{ $PartnerSurvey->future_improvements }}</textarea>
                                @error('future_improvements')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">2.Are there any additional services or support you would like
                                    NCPD to provide?</label>
                                <textarea name="additional_services" class="form-control">{{ $PartnerSurvey->additional_services }}</textarea>
                                @error('additional_services')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">3.Would you be interested in participating in future
                                    international exhibitions organized by NCPD?</label>
                                @foreach (['Yes', 'Maybe', 'No'] as $option)
                                    <div class="form-check">
                                        <input type="radio" name="interested_in_future_exhibitions"
                                            value="{{ $option }}" class="form-check-input"
                                            {{ $PartnerSurvey->interested_in_future_exhibitions == $option ? 'checked' : '' }}>
                                        <label class="form-check-label">{{ $option }}</label>
                                    </div>
                                @endforeach
                                @error('interested_in_future_exhibitions')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary">Update Survey</button>
                            </div>
                        </form>



                    @endif

                </div>
            </div>
        </div>
    </div>

    <footer class="text-center mt-5 text-muted">
        <p>All rights reserved &copy; 2025 - Powered by <strong>NCPD</strong></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>

</html>
