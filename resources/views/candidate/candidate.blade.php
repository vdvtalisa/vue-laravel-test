@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-6 offset-sm-2">
            <h3>Complete your profile</h3>
            <span class="text-muted">This will only be shown to legit companies. We don't mess with headhunters, agency recruiters or third parties.</span>
            <candidate-profile-form candidate="{{ $candidate }}" tags="{{ $allTags }}" candidate-tags="{{ $candidateTags }}"></candidate-profile-form>
        </div>
    </div>
@endsection
