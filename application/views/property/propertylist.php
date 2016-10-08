<div class="container">
	<div class="row">
		<div class="col-md-8">
			<?php echo form_open('property/searchLocation');?>
			<input type="text" name="location" placeholder="enter location">
			<button type="submit" class="btn btn-primary">Search</button>
			<a type="button" class="btn btn-success" href="searchAll">Search All</a>
			<?php echo form_close();?>
		</div>
	</div>
	<div class="row">
		Sort by
		<select>
			<option></option>
			<option>Price - High to low</option>
			<option>Price - Low to High</option>
			<option>Newest</option>
			<option>Oldest</option>
			<option>Smallest</option>
			<option>Largest</option>
		</select>
	</div>
	<div class="row">
		<div class="col-md-8">
			<?php foreach ($propertylists as $property):?>
			<ul style="list-style: none;">
				<li>
				<?php echo $property['area']?>, 
				<?php echo $property['room_type'];?>,
				<?php echo $property['selling_type'];?>,
				<?php echo $property['property_type'];?>,
				<?php echo $property['location'];?>,
				<?php echo $property['address'];?> 
				</li>
			</ul>
			<?php endforeach;?>
		</div>
	</div>
</div>