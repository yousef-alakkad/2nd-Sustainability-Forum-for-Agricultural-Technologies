<!doctype html>
<html lang="en" class="light-theme" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Visitor Feedback Survey</title>
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
            <h2 class="fw-bold mt-3" style="color: #ecdfb2;">Visitor Feedback Survey</h2>
            <p class="lead" style="color: #ecdfb2;">Thank you for visiting the NCPD stand! We’d love your quick
                feedback (1–2 minutes):</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="card p-4" data-aos="fade-up">


                    {{-- @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}

                    <form method="POST" action="{{ route('survey.update', $survey->id) }}">
                        @csrf
                        @method('PUT')
                        <!-- 1. Name (Optional) -->
                        <div class="mb-4">
                            <label class="form-label">1. Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $survey->name }}"
                                placeholder="Enter your name " required>
                        </div>

                        <!-- 2. Company -->
                        <div class="mb-4">
                            <label class="form-label">2. Company</label>
                            <input type="text" class="form-control" name="company" value="{{ $survey->company }}"
                                placeholder="Enter your company " required>
                            @error('company')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- 3. Country -->
                        <div class="mb-4">
                            <label class="form-label">3. Country</label>
                            <input type="text" class="form-control" name="country" value="{{ $survey->country }}"
                                placeholder="Enter your country " required>
                            @error('country')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- 4. Contact -->
                        <div class="mb-4">
                            <label class="form-label">4. Contact Number Or Email</label>
                            <input type="text" class="form-control" name="contact_number"
                                value="{{ $survey->contact_number }}" placeholder="Enter your Contact Number Or Email">
                            @error('contact_number')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Question 5 -->
                        <div class="mb-4">
                            <label class="form-label">5. How would you rate your overall experience at our
                                stand?</label>
                            @foreach (['Excellent', 'Good', 'Average', 'Poor'] as $value)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="overall_experience"
                                        id="exp_{{ $value }}" value="{{ $value }}"
                                        {{ $survey->overall_experience == $value ? 'checked' : '' }}>
                                    <label class="form-check-label"
                                        for="exp_{{ $value }}">{{ $value }}</label>
                                </div>
                            @endforeach
                            @error('overall_experience')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Question 2 -->
                        <div class="mb-4">
                            <label class="form-label">6. What interested you the most?</label>
                            @php
                                $interests = $survey->interests;
                                $options = [
                                    'Saudi date varieties',
                                    'Nutritional benefits',
                                    'Export and investment opportunities',
                                    'Partner companies',
                                    'NCPD programs (Academy, Award, etc.)',
                                ];
                            @endphp
                            @foreach ($options as $key => $label)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="interests[]"
                                        id="interest_{{ $key }}" value="{{ $label }}"
                                        {{ in_array($label, $interests) ? 'checked' : '' }}>
                                    <label class="form-check-label"
                                        for="interest_{{ $key }}">{{ $label }}</label>
                                </div>
                            @endforeach
                            @error('interests')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Question 3 -->
                        <div class="mb-4">
                            <label class="form-label">7. Would you like to receive more information after the
                                event?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="wants_more_info" id="more_info"
                                    value="1" {{ $survey->wants_more_info ? 'checked' : '' }}>
                                <label class="form-check-label" for="more_info">Yes, please send me more
                                    information</label>
                            </div>
                            <input type="email" class="form-control mt-2" name="email"
                                placeholder="Enter your email" value="{{ $survey->email }}">
                            @error('email')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Question 4 -->
                        <div class="mb-4">
                            <label class="form-label">8. Are you interested in future collaboration?</label>
                            @php
                                $collab_types = $survey->collaboration_types;
                                $collab_options = [
                                    'Yes – as a buyer',
                                    'Yes – as an investor',
                                    'Yes – for research/innovation',
                                    'No',
                                ];
                            @endphp
                            @foreach ($collab_options as $index => $option)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="collaboration_types[]"
                                        id="collab_{{ $index }}" value="{{ $option }}"
                                        {{ in_array($option, $collab_types) ? 'checked' : '' }}>
                                    <label class="form-check-label"
                                        for="collab_{{ $index }}">{{ $option }}</label>
                                </div>
                            @endforeach
                            @error('collaboration_types')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Question 5 -->
                        <div class="mb-4">
                            <label class="form-label">9. Any comments or suggestions?</label>
                            <textarea class="form-control" name="comments" rows="4" placeholder="We’d love to hear your thoughts...">{{ $survey->comments }}</textarea>
                        </div>

                        <!-- Submit -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Update Survey</button>
                        </div>
                    </form>

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
