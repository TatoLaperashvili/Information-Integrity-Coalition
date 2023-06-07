<table class="table mb-0">
    <caption>update/event Submission</caption>
    <thead>
        <tr>
            <th >#</th>
            <th >Name</th>
            <th >Email</th>

            <th >text</th>
            <th>Posts Title</th>
            <th > Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach($submissions as $key => $submission)
       
        <tr>
            
                <td scope="row">{{ $key + 1 }}</td>
                <td >
                    {{$submission->name}}
                </td>
    
                <td >
                    {{ $submission->email}}
                </td>
               
                <td >
                    {{ $submission->text}}
                </td>
           
                @if(isset($submission->post))
                <td>
                    {{ $submission->post->translate()->title }}
                </td>
                @endif
                <td > {{ $submission->created_at->format('H:i - d.m.Y') }}</td>
            
        </tr>
        @endforeach
    </tbody>
</table>
