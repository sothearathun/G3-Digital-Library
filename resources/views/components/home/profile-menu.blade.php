<link rel="stylesheet" href="{{ asset('css/web/profile_menu.css') }}">

<div class="menu" style="display: none;">
    <ul>
        <li><a href="{{ route('profile', ['user_id' => auth()->id()]) }}">Profile</a></li>
        <li><a href="{{ route('faq') }}">FAQ</a></li>
        <li><a href="{{ route('terms_conditions') }}">Terms & Conditions</a></li>
        <li>
          <form action="{{ route('processLogout') }}" method="POST">
            @csrf
            
            <button type="submit" class="logout-button">Logout</button>
          </form>
        </li>
    </ul>
</div>

<script src="{{ asset('js/web/profile_menu.js') }}"></script>