 {{-- uploaded files preview --}}
 <div>
    <table class="table table-bordered" id="uploaded_file_table_id">
        <tbody id="file_name_div">
            @if ($files)
                @foreach ( $files  as $item)
                    <tr>
                        <td><a href="{{$item->url}}" download>{{$item->uploaded_name}}</a></td>
                        <td class="text-center">{{$item->type}}</td>
                        <td class="text-center" id="DeleteButton">
                            <span class="badge badge-primary badge-pill delete-btn"  ><i class="fa fa-trash" style="color:red" ></i></span>
                        </td>
                        <td class="text-center">
                            <a href="{{$item->url}}" download><span class="badge badge-primary badge-pill delete-btn"  ><i class="fa fa-download"  ></i></span></a>

                        </td>

                    </tr>
                @endforeach
            @endif
           
        </tbody>
    </table>
 </div>