

<select class="input-lg" id="subcat" name="subcat">

	<option value="">Choose category..</option>
	@foreach($categoriesAjax as $categoryAjax)

 		<option value="{{$categoryAjax->parent_category_id}}">{{$categoryAjax->name}}</option>
	@endforeach
</select>


   
