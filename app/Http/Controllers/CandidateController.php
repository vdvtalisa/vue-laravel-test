<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Tags\Tag;

class CandidateController extends Controller
{
    public function edit($id)
    {
        $candidate = auth()->user();

        if ($candidate->id != $id) {
           abort(403, 'Forbidden');
        }

        // Get all the available tags candidates can select
        $allTags = Tag::getWithType('candidate')->map(function ($tag) {
            return $tag->only(['name']);
        })->pluck('name');

        $candidate->load([
            'tags'
        ]);

        // Only grab the name of the tags the candidate has (not the whole tag object)
        $candidateTags = $candidate->tags->map(function($tag) {
            return $tag->only(['name']);
        })->pluck('name');

        return view('candidates.edit', compact('candidate', 'allTags', 'candidateTags'));
    }

    public function update(Request $request, $id)
    {
        $candidate = auth()->user();

        if($candidate->id != $id) {
            abort(403, 'Forbidden. You can only update your own profile.');
        }

        $request->validate([
           'summary' => 'nullable|string',
        ]);

        $user = User::find($id);

        $user->summary = trim($request->input('summary'));

        $tags = $request->input('tags');
        $user->attachTags($tags);

        $user->save();

        return response()->json(
            [
                'message' => 'You updated your profile!',
                'candidate' => $user,
            ]
        );
    }
}
