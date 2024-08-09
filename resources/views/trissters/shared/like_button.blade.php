<div>
    @auth()
        @if (Auth::user()->likesTrisster($trisster))
            <form action="{{ route('trisster.unlike', $trisster->id) }}" method="POST">
                @csrf
                <button type="submit" class="fw-light nav-link fs-6">
                    <span class="fas fa-heart me-1"> </span> {{ $trisster->likes()->count() }}
                </button>
            </form>
        @else
            <form action="{{ route('trisster.like', $trisster->id) }}" method="POST">
                @csrf
                <button type="submit" class="fw-light nav-link fs-6">
                    <span class="far fa-heart me-1"> </span> {{ $trisster->likes()->count() }}
                </button>
            </form>
        @endif
    @endauth
    @guest
    <a  href ="{{route('login')}}" class="fw-light nav-link fs-6">
        <span class="far fa-heart me-1"> </span> {{ $trisster->likes()->count() }}
    </a>

    @endguest
</div>
