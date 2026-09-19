<?php

namespace App\Services;

use App\Models\Participant;
use Illuminate\Support\Facades\Auth;

class ParticipantService
{
    // Get or create a participant for the currently authenticated user.
    public function getCurrentParticipant(): Participant
    {
        $user = Auth::user();

        if (! $user) {
            throw new \RuntimeException('User must be authenticated.');
        }

        $user->load('participant');

        return $user->participant()->firstOrCreate();
    }

    // Get the current participant with the user relationship loaded
    public function getCurrentParticipantWithUser(): Participant
    {
        $participant = $this->getCurrentParticipant();
        $participant->load('user');

        return $participant;
    }

    // Update the current participant and their associated user
    public function updateCurrentParticipant(array $participantData, array $userData = []): Participant
    {
        $participant = $this->getCurrentParticipant();

        // Update participant
        $participant->update($participantData);

        // Update user if data is provided
        if (! empty($userData)) {
            $participant->user->update($userData);
        }

        // Refresh and return with relationships
        return $participant->refresh()->load('user');
    }
}
