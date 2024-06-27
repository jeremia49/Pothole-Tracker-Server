<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Pothole Tracker Official Website">
    <meta name="author" content="Jeremia Manurung">
    <link rel="icon" href="{{ Vite::asset('resources/images/1-wo-watermark.ico') }}">

    <title>Privacy Policy | Pothole Tracker </title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        :root {
            --jumbotron-padding-y: 3rem;
        }

        .jumbotron {
            padding-top: var(--jumbotron-padding-y);
            padding-bottom: var(--jumbotron-padding-y);
            margin-bottom: 0;
            background-color: #fff;
        }

        @media (min-width: 768px) {
            .jumbotron {
                padding-top: calc(var(--jumbotron-padding-y) * 2);
                padding-bottom: calc(var(--jumbotron-padding-y) * 2);
            }
        }

        .jumbotron p:last-child {
            margin-bottom: 0;
        }

        .jumbotron-heading {
            font-weight: 300;
        }

        .jumbotron .container {
            max-width: 40rem;
        }

        footer {
            padding-top: 3rem;
            padding-bottom: 3rem;
        }

        footer p {
            margin-bottom: .25rem;
        }

        .box-shadow {
            box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);
        }
    </style>
</head>

<body>

    <header>
        <div class="navbar navbar-dark bg-dark box-shadow">
            <div class="container d-flex justify-content-between">
                <a href="{{route('landing')}}" class="navbar-brand d-flex align-items-center">
                    <img width="100" height="100" src="{{ Vite::asset('resources/images/1-wo-watermark.png') }}" alt="">
                    <strong>Pothole Tracker</strong>
                </a>
                <div class="d-flex justify-content-between float-right">
                    @if(Auth::check())
                    <form action="{{route('settinginference')}}" method="GET">
                        <button onclick="location.href='{{route('settinginference')}}'" value="Login" type="submit" class="btn btn-light">Menu</button>
                    </form>
                    @else
                    <form action="{{route('loginweb')}}" method="GET">
                        <button onclick="location.href='{{route('loginweb')}}'" value="Login" type="submit" class="btn btn-light">Login</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </header>

    <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Privacy Policy</h1>
            </div>
        </section>

        <div class="container">
            <p><strong>Effective Date: 28-June-2024</strong></p>
            <p>Welcome to PotholeTracker! This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you use our Android application ("App"). By using the App, you agree to the collection and use of information in accordance with this policy.</p>

            <h2>1. Information We Collect</h2>
            <h3>1.1 Personal Information</h3>
            <ul>
                <li><strong>Account Information:</strong> When you create an account, we may collect your name, email address, and other contact details.</li>
                <li><strong>Location Data:</strong> We collect precise geolocation data to identify and track potholes on the streets. This data is essential for providing early warnings to other users.</li>
            </ul>

            <h3>1.2 Non-Personal Information</h3>
            <ul>
                <li><strong>Device Information:</strong> We may collect information about your device, including its model, operating system, unique device identifiers, and mobile network information.</li>
                <li><strong>Usage Data:</strong> We collect information on how you interact with the App, including the features you use, the actions you take, and the time, frequency, and duration of your activities.</li>
            </ul>

            <h2>2. How We Use Your Information</h2>
            <h3>2.1 To Provide and Maintain the App</h3>
            <ul>
                <li>Use geolocation data to track and report potholes.</li>
                <li>Provide early warnings to users about potholes on their route.</li>
            </ul>

            <h3>2.2 To Improve the App</h3>
            <ul>
                <li>Analyze usage patterns to enhance user experience and App functionality.</li>
                <li>Conduct research and analysis to understand the effectiveness of our services.</li>
            </ul>

            <h3>2.3 To Communicate with You</h3>
            <ul>
                <li>Send updates, notifications, and other information related to the App.</li>
                <li>Respond to your comments, questions, and customer service requests.</li>
            </ul>

            <h2>3. Sharing Your Information</h2>
            <h3>3.1 With Service Providers</h3>
            <p>We may share your information with third-party service providers that perform services on our behalf, such as data analysis, email delivery, and hosting services.</p>

            <h3>3.2 For Legal Purposes</h3>
            <p>We may disclose your information if required to do so by law or in response to valid requests by public authorities.</p>

            <h3>3.3 With Other Users</h3>
            <p>Your location data and reports on potholes may be shared with other users to provide them with early warnings.</p>

            <h2>4. Security of Your Information</h2>
            <p>We use administrative, technical, and physical security measures to protect your personal information. While we strive to use commercially acceptable means to protect your personal information, we cannot guarantee its absolute security.</p>

            <h2>5. Your Choices</h2>
            <h3>5.1 Location Data</h3>
            <p>You can disable the location tracking feature at any time in your device settings, but this may affect the functionality of the App.</p>

            <h3>5.2 Account Information</h3>
            <p>You may update or delete your account information by contacting us at <a href="mailto:[Contact Email]">[Contact Email]</a>. However, we may retain certain information as required by law or for legitimate business purposes.</p>

            <h2>6. Children's Privacy</h2>
            <p>Our App is not intended for use by children under the age of 13. We do not knowingly collect personally identifiable information from children under 13. If we become aware that we have collected personal data from a child under 13, we will take steps to delete that information.</p>

            <h2>7. Changes to This Privacy Policy</h2>
            <p>We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page. You are advised to review this Privacy Policy periodically for any changes.</p>

            <h2>8. Contact Us</h2>
            <p>If you have any questions about this Privacy Policy, please contact us at:</p>
            <ul>
                <li><strong>Email:</strong> <a href="mailto:jeremiaman49@gmail.com">jeremiaman49@gmail.com</a></li>
                <li><strong>Address:</strong> Jl. William Iskandar Ps. V, Kenangan Baru, Kec. Percut Sei Tuan, Kabupaten Deli Serdang, Sumatera Utara, Indonesia.</li>
            </ul>

            <p>By using PotholeTracker, you consent to our Privacy Policy. Thank you for helping us keep the roads safe!</p>
        </div>

    </main>

    <footer class="text-muted bg-light">
        <div class="container">
            <p class="text-small">Project Tugas Akhir Mahasiswa S1 Ilmu Komputer Universitas Negeri Medan</p>
            <small class="d-block mb-3 text-muted">&copy; 2024 Jeremia Manurung</small>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</body>

</html>