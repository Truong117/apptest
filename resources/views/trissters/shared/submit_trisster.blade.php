@auth

<h4> Share yours Triss </h4>
<div class="row">
    <form action="{{ route('trisster.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <textarea name="content" class="form-control" id="content" rows="3"></textarea>
            @error('trisster')
                <span class="fs-6 text-danger"> {{ $message }}</span>
            @enderror
        </div>
        <div class="">
            <button type="submit" class="btn btn-dark"> Share </button>
        </div>
    </form>
</div>
@endauth
@guest
    <h4> Login to share your Trisster</h4>
@endguest
