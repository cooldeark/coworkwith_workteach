<form name="myUpload" action="uploadFile" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
<input type="file" name="upload"   />



<button type="submit">submit</button>
</form>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif