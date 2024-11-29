@if(session('success'))
    <audio id="successSound" src="{{ asset('assets/sounds/alert/success.mp3') }}"></audio>
    <div class="alert alert-success alert-dismissible fade show position-fixed animate__animated animate__fadeInRight" style="bottom: 60px; right: 20px; z-index: 99" role="alert">
        <strong>Success!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <script>
        document.getElementById('successSound').play();
        setTimeout(function() {
            document.querySelector('.alert-success').classList.remove('show');
            document.querySelector('.alert-success').classList.add('animate__fadeOutRight');
            setTimeout(function() {
                document.querySelector('.alert-success').remove();
            }, 1000);
        }, 5000);
    </script>
@endif

@if(session('error'))
    <audio id="errorSound" src="{{ asset('assets/sounds/alert/error.mp3') }}"></audio>
    <div class="alert alert-danger alert-dismissible fade show position-fixed animate__animated animate__fadeInRight" style="top: 20px; right: 20px; z-index: 999999" role="alert">
        <strong>Error!</strong> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <script>
        document.getElementById('errorSound').play();
        setTimeout(function() {
            document.querySelector('.alert-danger').classList.remove('show');
            document.querySelector('.alert-danger').classList.add('animate__fadeOutRight');
            setTimeout(function() {
                document.querySelector('.alert-danger').remove();
            }, 1000);
        }, 5000);
    </script>
@endif

@if(session('warning'))
    <audio id="warningSound" src="{{ asset('assets/sounds/alert/success.mp3') }}"></audio>
    <div class="alert alert-warning alert-dismissible fade show position-fixed animate__animated animate__fadeInRight" style="top: 20px; right: 20px; z-index: 999999" role="alert">
        <strong>Warning!</strong> {{ session('warning') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <script>
        document.getElementById('warningSound').play();
        setTimeout(function() {
            document.querySelector('.alert-warning').classList.remove('show');
            document.querySelector('.alert-warning').classList.add('animate__fadeOutRight');
            setTimeout(function() {
                document.querySelector('.alert-warning').remove();
            }, 1000);
        }, 5000);
    </script>
@endif

@if(session('info'))
    <audio id="infoSound" src="{{ asset('assets/sounds/alert/success.mp3') }}"></audio>
    <div class="alert alert-info alert-dismissible fade show position-fixed animate__animated animate__fadeInRight" style="top: 20px; right: 20px; z-index: 999999" role="alert">
        <strong>Info!</strong> {{ session('info') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <script>
        document.getElementById('infoSound').play();
        setTimeout(function() {
            document.querySelector('.alert-info').classList.remove('show');
            document.querySelector('.alert-info').classList.add('animate__fadeOutRight');
            setTimeout(function() {
                document.querySelector('.alert-info').remove();
            }, 1000);
        }, 5000);
    </script>
@endif

@if ($errors->any())
    <audio id="errorSound" src="{{ asset('assets/sounds/alert/error.mp3') }}"></audio>
    <div class="alert alert-danger alert-dismissible fade show position-fixed animate__animated animate__fadeInRight" style="bottom: 60px; right: 20px; z-index: 99" role="alert">
        <strong>Error!</strong> 
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <script>
        document.getElementById('errorSound').play();
        setTimeout(function() {
            document.querySelector('.alert-danger').classList.remove('show');
            document.querySelector('.alert-danger').classList.add('animate__fadeOutRight');
            setTimeout(function() {
                document.querySelector('.alert-danger').remove();
            }, 1000);
        }, 5000);
    </script>
@endif
