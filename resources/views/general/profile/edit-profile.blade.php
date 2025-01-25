@extends('layouts.app')
@section('content')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Edit Profile</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            @if (Auth::user())
                                @if (Auth::user()->role == 'admin')
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none"
                                            href="{{ route('admin.dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none" href="{{ route('admin.profile') }}">My
                                            Profile</a>
                                    </li>
                                @elseif (Auth::user()->role == 'family')
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none"
                                            href="{{ route('family.dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none" href="{{ route('family.profile') }}">My
                                            Profile</a>
                                    </li>
                                @elseif (Auth::user()->role == 'patient')
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none"
                                            href="{{ route('patient.dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none" href="{{ route('patient.profile') }}">My
                                            Profile</a>
                                    </li>
                                @elseif (Auth::user()->role == 'doctor')
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none"
                                            href="{{ route('doctor.dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none" href="{{ route('doctor.profile') }}">My
                                            Profile</a>
                                    </li>
                                @endif
                            @endif

                            <li class="breadcrumb-item" aria-current="page">Edit Profile</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="assets/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form class="row" id="profileForm">
        @csrf
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100 position-relative overflow-hidden">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold">Change Profile</h5>
                    <p class="card-subtitle mb-4">Change your profile picture from here</p>
                    <div class="text-center">
                        <img src="{{ $profile && $profile->profile_img ? asset('profile_images/' . $profile->profile_img) : 'assets/images/profile/user-1.jpg' }}"
                            id="profileImgPreview" alt="" class="img-fluid rounded-circle" width="120"
                            height="120">
                        <div class="d-flex align-items-center justify-content-center my-4 gap-3">
                            <input type="file" name="profile_img" id="profile_img" class="d-none"
                                accept=".png,.jpg,.jpeg">
                            <label for="profile_img" class="btn btn-primary" id="uploadProfileImgBtn">Upload</label>
                            <button class="btn btn-outline-danger" type="button" id="resetProfileImgBtn">Reset</button>
                        </div>
                        <p class="mb-0">Allowed JPG, JPEG or PNG. Max size of 2000K</p>
                        <span id="profile_imgError" class="mt-2 mb-0 badge fs-2 bg-danger-subtle text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mb-4">
            <div class="card w-100 position-relative overflow-hidden mb-0">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold">Profile Details</h5>
                    <p class="card-subtitle mb-4">To change your profile detail , edit and save from
                        here</p>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <label for="bio" class="form-label fw-semibold">Biography</label>
                                <input type="text" id="bio" name="bio" class="form-control"
                                    placeholder="Biography here" value="{{ $profile ? $profile->bio : '' }}">
                                <span id="bioError" class="mt-2 mb-0 badge fs-2 bg-danger-subtle text-danger"></span>
                            </div>
                            <div class="mb-4">
                                <label for="gender" class="form-label fw-semibold">Gender</label>
                                <select class="select2 form-control" id="gender" name="gender">
                                    <option selected disabled>Select Gender</option>
                                    <option value="male"
                                        {{ old('gender', $profile->gender ?? '') == 'male' ? 'selected' : '' }}>Male
                                    </option>
                                    <option value="female"
                                        {{ old('gender', $profile->gender ?? '') == 'female' ? 'selected' : '' }}>Female
                                    </option>
                                </select>
                                <span id="genderError" class="mt-2 mb-0 badge fs-2 bg-danger-subtle text-danger"></span>
                            </div>
                            <div class="mb-4">
                                <label for="country" class="form-label fw-semibold">Country</label>
                                <select class="select2 form-control" id="country" name="country">
                                    <option selected disabled>Select Country</option>
                                    @php
                                        $countries = [
                                            'Afghanistan',
                                            'Albania',
                                            'Algeria',
                                            'Andorra',
                                            'Angola',
                                            'Antigua and Barbuda',
                                            'Argentina',
                                            'Armenia',
                                            'Australia',
                                            'Austria',
                                            'Azerbaijan',
                                            'Bahamas',
                                            'Bahrain',
                                            'Bangladesh',
                                            'Barbados',
                                            'Belarus',
                                            'Belgium',
                                            'Belize',
                                            'Benin',
                                            'Bhutan',
                                            'Bolivia',
                                            'Bosnia and Herzegovina',
                                            'Botswana',
                                            'Brazil',
                                            'Brunei',
                                            'Bulgaria',
                                            'Burkina Faso',
                                            'Burundi',
                                            'Cabo Verde',
                                            'Cambodia',
                                            'Cameroon',
                                            'Canada',
                                            'Central African Republic',
                                            'Chad',
                                            'Chile',
                                            'China',
                                            'Colombia',
                                            'Comoros',
                                            'Congo (Congo-Brazzaville)',
                                            'Costa Rica',
                                            'Croatia',
                                            'Cuba',
                                            'Cyprus',
                                            'Czechia (Czech Republic)',
                                            'Democratic Republic of the Congo',
                                            'Denmark',
                                            'Djibouti',
                                            'Dominica',
                                            'Dominican Republic',
                                            'Ecuador',
                                            'Egypt',
                                            'El Salvador',
                                            'Equatorial Guinea',
                                            'Eritrea',
                                            'Estonia',
                                            'Eswatini (fmr. "Swaziland")',
                                            'Ethiopia',
                                            'Fiji',
                                            'Finland',
                                            'France',
                                            'Gabon',
                                            'Gambia',
                                            'Georgia',
                                            'Germany',
                                            'Ghana',
                                            'Greece',
                                            'Grenada',
                                            'Guatemala',
                                            'Guinea',
                                            'Guinea-Bissau',
                                            'Guyana',
                                            'Haiti',
                                            'Honduras',
                                            'Hungary',
                                            'Iceland',
                                            'India',
                                            'Indonesia',
                                            'Iran',
                                            'Iraq',
                                            'Ireland',
                                            'Israel',
                                            'Italy',
                                            'Jamaica',
                                            'Japan',
                                            'Jordan',
                                            'Kazakhstan',
                                            'Kenya',
                                            'Kiribati',
                                            'Kuwait',
                                            'Kyrgyzstan',
                                            'Laos',
                                            'Latvia',
                                            'Lebanon',
                                            'Lesotho',
                                            'Liberia',
                                            'Libya',
                                            'Liechtenstein',
                                            'Lithuania',
                                            'Luxembourg',
                                            'Madagascar',
                                            'Malawi',
                                            'Malaysia',
                                            'Maldives',
                                            'Mali',
                                            'Malta',
                                            'Marshall Islands',
                                            'Mauritania',
                                            'Mauritius',
                                            'Mexico',
                                            'Micronesia',
                                            'Moldova',
                                            'Monaco',
                                            'Mongolia',
                                            'Montenegro',
                                            'Morocco',
                                            'Mozambique',
                                            'Myanmar (Burma)',
                                            'Namibia',
                                            'Nauru',
                                            'Nepal',
                                            'Netherlands',
                                            'New Zealand',
                                            'Nicaragua',
                                            'Niger',
                                            'Nigeria',
                                            'North Korea',
                                            'North Macedonia',
                                            'Norway',
                                            'Oman',
                                            'Pakistan',
                                            'Palau',
                                            'Palestine State',
                                            'Panama',
                                            'Papua New Guinea',
                                            'Paraguay',
                                            'Peru',
                                            'Philippines',
                                            'Poland',
                                            'Portugal',
                                            'Qatar',
                                            'Romania',
                                            'Russia',
                                            'Rwanda',
                                            'Saint Kitts and Nevis',
                                            'Saint Lucia',
                                            'Saint Vincent and the Grenadines',
                                            'Samoa',
                                            'San Marino',
                                            'Sao Tome and Principe',
                                            'Saudi Arabia',
                                            'Senegal',
                                            'Serbia',
                                            'Seychelles',
                                            'Sierra Leone',
                                            'Singapore',
                                            'Slovakia',
                                            'Slovenia',
                                            'Solomon Islands',
                                            'Somalia',
                                            'South Africa',
                                            'South Korea',
                                            'South Sudan',
                                            'Spain',
                                            'Sri Lanka',
                                            'Sudan',
                                            'Suriname',
                                            'Sweden',
                                            'Switzerland',
                                            'Syria',
                                            'Tajikistan',
                                            'Tanzania',
                                            'Thailand',
                                            'Timor-Leste',
                                            'Togo',
                                            'Tonga',
                                            'Trinidad and Tobago',
                                            'Tunisia',
                                            'Turkey',
                                            'Turkmenistan',
                                            'Tuvalu',
                                            'Uganda',
                                            'Ukraine',
                                            'United Arab Emirates',
                                            'United Kingdom',
                                            'United States',
                                            'Uruguay',
                                            'Uzbekistan',
                                            'Vanuatu',
                                            'Vatican City',
                                            'Venezuela',
                                            'Vietnam',
                                            'Yemen',
                                            'Zambia',
                                            'Zimbabwe',
                                        ];
                                    @endphp
                                    @foreach ($countries as $country)
                                        <option value="{{ $country }}"
                                            {{ old('country', $profile->country ?? '') == $country ? 'selected' : '' }}>
                                            {{ $country }}
                                        </option>
                                    @endforeach
                                </select>
                                <span id="countryError" class="mt-2 mb-0 badge fs-2 bg-danger-subtle text-danger"></span>
                            </div>
                            <div class="mb-4">
                                <label for="date_of_birth" class="form-label fw-semibold">Date Of Birth</label>
                                <input type="date" id="date_of_birth" name="date_of_birth" class="form-control"
                                    placeholder="" max="{{ now()->format('Y-m-d') }}"
                                    value="{{ old('date_of_birth', $profile && $profile->date_of_birth ? $profile->date_of_birth : '') }}">
                                <span id="date_of_birthError"
                                    class="mt-2 mb-0 badge fs-2 bg-danger-subtle text-danger"></span>
                            </div>
                            <div class="mb-4">
                                <label for="instagram" class="form-label fw-semibold">Instagram Profile</label>
                                <input type="url" class="form-control" id="instagram" name="instagram"
                                    placeholder="https://instagram.com"
                                    value="{{ old('instagram', $profile->instagram ?? '') }}">
                                <span id="instagramError"
                                    class="mt-2 mb-0 badge fs-2 bg-danger-subtle text-danger"></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <label for="contact" class="form-label fw-semibold">Contact No</label>
                                <input type="tel" class="form-control" id="contact" name="contact"
                                    placeholder="Contact here" value="{{ old('contact', $profile->contact ?? '') }}">
                                <span id="contactError" class="mt-2 mb-0 badge fs-2 bg-danger-subtle text-danger"></span>
                            </div>
                            <div class="mb-4">
                                <label for="age" class="form-label fw-semibold">Age</label>
                                <input type="number" id="age" name="age" class="form-control"
                                    placeholder="Age here" min="18" max="70"
                                    value="{{ old('age', $profile->age ?? '') }}">
                                <span id="ageError" class="mt-2 mb-0 badge fs-2 bg-danger-subtle text-danger"></span>
                            </div>
                            <div class="mb-4">
                                <label for="city" class="form-label fw-semibold">City</label>
                                <input type="text" class="form-control" id="city" name="city" maxlength="30"
                                    placeholder="City here" value="{{ old('city', $profile->city ?? '') }}">
                                <span id="cityError" class="mt-2 mb-0 badge fs-2 bg-danger-subtle text-danger"></span>
                            </div>
                            <div class="mb-4">
                                <label for="facebook" class="form-label fw-semibold">Facebook Profile</label>
                                <input type="url" class="form-control" id="facebook" name="facebook"
                                    placeholder="https://facebook.com"
                                    value="{{ old('facebook', $profile->facebook ?? '') }}">
                                <span id="facebookError" class="mt-2 mb-0 badge fs-2 bg-danger-subtle text-danger"></span>
                            </div>
                            <div class="mb-4">
                                <label for="twitter" class="form-label fw-semibold">Twitter Profile</label>
                                <input type="url" class="form-control" id="twitter" name="twitter"
                                    placeholder="https://twitter.com"
                                    value="{{ old('twitter', $profile->twitter ?? '') }}">
                                <span id="twitterError" class="mt-2 mb-0 badge fs-2 bg-danger-subtle text-danger"></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="">
                                <label for="address" class="form-label fw-semibold">Address</label>
                                <textarea type="text" class="form-control" rows="4" id="address" name="address"
                                    placeholder="814 Howard Street, 120065, USA">{{ old('address', $profile->address ?? '') }}</textarea>
                                <span id="addressError" class="mt-2 mb-0 badge fs-2 bg-danger-subtle text-danger"></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-md-flex align-items-center mt-4">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="status" id="status"
                                        value="0" {{ old('status', $profile->status ?? false) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status">Default Profile Visible</label>
                                </div>
                                <div class="ms-auto mt-3 mt-md-0">
                                    <div class="d-flex align-items-center justify-content-end gap-3">
                                        <button class="btn btn-primary" type="submit">Save Changes</button>
                                        @if (Auth::user())
                                            @if (Auth::user()->role == 'admin')
                                                <a class="btn bg-danger-subtle text-danger"
                                                    href="{{ route('admin.profile') }}">Cancel</a>
                                            @elseif (Auth::user()->role == 'family')
                                                <a class="btn bg-danger-subtle text-danger"
                                                    href="{{ route('family.profile') }}">Cancel</a>
                                            @elseif (Auth::user()->role == 'patient')
                                                <a class="btn bg-danger-subtle text-danger"
                                                    href="{{ route('patient.profile') }}">Cancel</a>
                                            @elseif (Auth::user()->role == 'doctor')
                                                <a class="btn bg-danger-subtle text-danger"
                                                    href="{{ route('doctor.profile') }}">Cancel</a>
                                            @endif
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="{{ asset('assets/dash/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/dash/assets/libs/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#profile_img').change(function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#profileImgPreview').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });

            $('#resetProfileImgBtn').click(function() {
                $('#profile_img').val('');
                $('#profileImgPreview').attr('src',
                    "{{ $profile && $profile->profile_img ? asset('profile_images/' . $profile->profile_img) : 'assets/images/profile/user-1.jpg' }}"
                );
            });

            $('#status').on('change', function() {
                if ($(this).is(':checked')) {
                    $(this).val(1);
                } else {
                    $(this).val(0);
                }
            });

            $('#profileForm').on('submit', function(e) {
                e.preventDefault();
                $('.badge.text-danger').text('');
                let formData = new FormData(this);
                formData.append('_token', '{{ csrf_token() }}');
                @if (Auth::user())
                    @if (Auth::user()->role == 'admin')
                        let url = "{{ route('admin.profile.update') }}";
                    @elseif (Auth::user()->role == 'family')
                        let url = "{{ route('family.profile.update') }}";
                    @elseif (Auth::user()->role == 'patient')
                        let url = "{{ route('patient.profile.update') }}";
                    @elseif (Auth::user()->role == 'doctor')
                        let url = "{{ route('doctor.profile.update') }}";
                    @endif
                @endif

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        $('button[type="submit"]').prop('disabled', true).html(`
                            <div class="d-flex align-items-center">
                                <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                                Submitting...
                            </div>
                        `);
                        $('#uploadProfileImgBtn').prop('disabled', true);
                    },
                    success: function(response) {
                        if (response.success) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: "top-end",
                                showConfirmButton: false,
                                timer: 2000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.onmouseenter = Swal.stopTimer;
                                    toast.onmouseleave = Swal.resumeTimer;
                                }
                            });
                            Toast.fire({
                                icon: "success",
                                title: response.success,
                            });
                        } else {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: "top-end",
                                showConfirmButton: false,
                                timer: 2000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.onmouseenter = Swal.stopTimer;
                                    toast.onmouseleave = Swal.resumeTimer;
                                }
                            });
                            Toast.fire({
                                icon: "error",
                                title: "Something went wrong. Please try again.",
                            });
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            for (let field in errors) {
                                $(`#${field}Error`).text(errors[field][
                                    0
                                ]);
                            }
                        } else {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: "top-end",
                                showConfirmButton: false,
                                timer: 2000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.onmouseenter = Swal.stopTimer;
                                    toast.onmouseleave = Swal.resumeTimer;
                                }
                            });
                            Toast.fire({
                                icon: "error",
                                title: "An unexpected error occurred. Please try again.",
                            });
                        }
                    },
                    complete: function() {
                        $('button[type="submit"]').prop('disabled', false).html(`
                            Save Changes
                        `);
                        $('#uploadProfileImgBtn').prop('disabled', false);
                    },
                });
            });
        });
    </script>
@endsection
