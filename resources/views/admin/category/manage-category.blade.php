@extends('admin.master')

@section('title')
Manage Categories
@endsection

@section('mainContent')
<div class="row-fluid">
  <div class="span12">
<!-- BEGIN BASIC PORTLET-->
   <div class="widget orange">
    <div class="widget-title">
        <h4><i class="icon-reorder"></i> Manage Categories </h4>
    <span class="tools">
        <a href="javascript:;" class="icon-chevron-down"></a>
        <a href="javascript:;" class="icon-remove"></a>
    </span>
    </div>
    <div class="widget-body">
    
    <h2 class="text-center text-success">{{Session::get('message')}}</h2>    

        <table class="table table-striped table-bordered table-advance table-hover">
            <thead>
            <tr>
                <th><i class="icon-bullhorn"></i> Category Id</th>
                <th class="hidden-phone"><i class="icon-question-sign"></i> Category Name</th>
                
                <th><i class=" icon-edit"></i> Status</th>
                <th><i class="icon-bookmark"></i> Action</th>
                <th></th>
            </tr>
            </thead>  
           <tbody>
<!-- to check data-->
<?php 
//echo '<pre>';
//var_dump($all_category_info); // print_r($all_category_info);
    $i=1;
?>

@foreach($all_category_info as $vcategory)

    <tr>
        <td><a href="#">{{ $i++ }}</a></td>
        <td class="hidden-phone">{{ $vcategory->category_name }}</td>
        <td>
            <?php 
              if($vcategory->publication_status==1){
            ?>
            <span class="label label-success label-mini">Published</span>
           <?php } else{ ?>
           <span class="label label-important label-mini">Unpublished</span>
           <?php } ?> 
        </td>
        <td>
            <?php 
              if($vcategory->publication_status==1){
            ?>
            <a href="{{ url('/unpublished-category/'.$vcategory->category_id) }}" class="btn btn-danger"><i class="icon-thumbs-down"></i></a>
            <?php } else{ ?>
            <a href="{{ url('/published-category/'.$vcategory->category_id) }}" class="btn btn-success"><i class="icon-thumbs-up"></i></a>
            <?php } ?> 
            <a href="{{ url('/edit-category/'.$vcategory->category_id) }}" class="btn btn-primary"><i class="icon-pencil"></i></a>
            <a href="{{ url('/delete-category/'.$vcategory->category_id) }}" class="btn btn-danger" onclick="return checkDelete()"><i class="icon-trash "></i></a>
        </td>
    </tr>
       
@endforeach
            </tbody>
        </table>
      </div>
    </div>
<!-- END BASIC PORTLET-->
  </div>
</div>
@endsection
