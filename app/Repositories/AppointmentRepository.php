<?php

namespace App\Repositories;

use App\Interfaces\AppointmentInterface;
use App\User;
use App\Appointment;
use App\Type;
use Illuminate\Support\Arr;

class AppointmentRepository implements AppointmentInterface
{
    public function index($params)
    {
        $appts = User::with('appointments', 'appointments.type');

        if ($name = Arr::get($params, 'name')) {
            $appts->where('name', 'like', '%' . $name . '%');
        }

        if ($dob = Arr::get($params, 'CNP')) {
            $appts->where('CNP', 'like', $dob . '%');
        }

        if ($create = Arr::get($params, 'create')) {
            $appts->where('create', 'like', $create . '%');
        }

        if ($appointment_date = Arr::get($params, 'date_of_appointment')) {
            $appts = Appointment::with('user', 'type')->where('date_of_appointment', 'like', $appointment_date . '%');
        }

        return response()->json([$appts->get()]);
    }

    public function create($params)
    {
        $user = User::find(Arr::get($params, 'user_id'));

        if (! $user) {
            return 'Unable to create appointment: User not found!';
        }

        if (! $type = Type::find(Arr::get($params, 'type_id'))) {
            return 'Unable to create appointment: Type does not exist!';
        }

        $appt = $user->appointments()->create([
            'date_of_appointment' => Arr::get($params, 'date_of_appointment'),
            // @todo make sure it's a valid type_id
            'type_id' => $type->id
        ]);

        return $appt;
    }

    public function update($id, $params)
    {
        $appt = Appointment::find($id);

        if (! $appt) {
            return 'Unable to update appointment: Appointment does not exist.';
        }
        return $appt->update($params);
    }

    public function delete($id)
    {
        $appt = Appointment::find($id);
        
        if (! $appt) {
            return 'Appointment not found!';
        }

        return $appt->delete();
    }
}