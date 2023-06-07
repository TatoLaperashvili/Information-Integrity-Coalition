<table>
    <caption>Collaborate Submission</caption>
    <thead>
        <tr>

            <th >#</th>
            <th >Name</th>
            <th colspan="3">Email</th>
            <th colspan="3">text</th>
            <th > Date</th>
        </tr>
    </thead>
    @foreach($submissions as $key => $submission)

    <tbody>

        <tr>
            <td scope="row">{{ $key + 1 }}</td>
            <td >
                {{ $submission->name}}
            </td>

            <td colspan="3">
                {{ $submission->email}}
            </td>
            <td colspan="3">
                {{ $submission->text}}
            </td>
            <td > {{ $submission->created_at->format('H:i - d.m.Y') }}</td>
        </tr>

    </tbody>
    @endforeach
</table>
