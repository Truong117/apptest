<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="{{$trisster->user->getImageURL()}}"
                    alt="{{$trisster->user->name}}" >
                <div>
                    <h5 class="card-title mb-0" ><a href="{{ route('users.show', $trisster->user) }}" > {{ $trisster->user->name }}
                        </a></h5>
                </div>
            </div>
            <div>
                <form method="POST" action="{{ route('trisster.destroy', $trisster->id) }}">
                    @csrf
                    @method('delete')
                    <a href="{{ route('trisster.show', $trisster->id) }}"> View </a>
                    @if (Auth::check() && auth()->user()->id === $trisster->user_id)
                        <a class="mx-2" href="{{ route('trisster.edit', $trisster->id) }}"> Edit </a>
                        <button class="ms-1 btn btn-danger btn-sm"> X </button>
                    @endif
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">
        @if ($editing ?? false)
            <form action="{{ route('trisster.update', $trisster->id) }}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <textarea name="content" class="form-control" id="content" rows="3"> {{ $trisster->content }}</textarea>
                    @error('content')
                        <span class="fs-6 text-danger"> {{ $message }}</span>
                    @enderror
                </div>
                <div class="">
                    <button type="submit" class="btn btn-dark mb-2"> Update </button>
                </div>
            </form>
        @else
            <p class="fs-6 fw-light text-muted">
                {{ $trisster->content }}
            </p>
        @endif
        <div class="d-flex justify-content-between">
            @include('trissters.shared.like_button')
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{ $trisster->created_at }} </span>
            </div>
        </div>
        @include('shared.comments_box')
    </div>
</div>
