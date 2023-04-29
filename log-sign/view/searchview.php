    <?php    
		include("view/header.php");
        include("view/footer.php");
	?>

	<div class="hero-section">

        <div class="hero-section-stuff">

            <div class="hero-section-search">

                <div class="loupe-icon"></div>

				<form action="index.php" method="get">      
                	<input type="hidden" name="action" value="search"    />  
			    	<input type="text" id="hero-section-search-input" class="hero-section-search-input" name="search-input" placeholder="Type restaurant name or place..." value="">
            		<button type="submit" class="hero-section-search-button"><?php echo LANG_SEARCH;?></button>
                </form>
            </div>

			<div class="hero-section-2">

                <div class="Restaurants_In_City_Name">Restaurants that match your search</div>

				<form action="index.php" method="get">
				    <input type="hidden" name="action" value="apply"    />

  					<select id="price-filter" class="Filtered_by" name="price-filter">
    					<option value="">filter price</option>
    					<option value="htol">price high to low</option>
    					<option value="ltoh">price low to high</option>
  					</select>

  					<select id="cuisine-filter" class="Filtered_by" name="cuisine-filter">
    					<option value="">filter cuisine</option>
    					<option value="algerian">Algerian</option>
    					<option value="italian">Italian</option>
    					<option value="mexican">Mexican</option>
    					<option value="chinese">Chinese</option>
    					<option value="japanese">Japanese</option>
    					<option value="indian">Indian</option>
    					<option value="french">French</option>
    					<option value="mediterranean">Mediterranean</option>
    					<option value="american">American</option>
    					<option value="seafood">Seafood</option>
    					<option value="steakhouse">Steakhouse</option>
    					<option value="vegetarian">Vegetarian</option>
    					<option value="vegan">Vegan</option>
    					<option value="gluten-free">Gluten-free</option>
  					</select>

  					<select id="delivery-filter" class="Filtered_by" name="delivery-filter">
    					<option value="">delivery option</option>
    					<option value="delivery">Delivery</option>
    					<option value="pickup">Pickup</option>
  					</select> 
  
  					<button type="submit" class="Apply-filter">Apply</button>
				</form>
			</div>			
		</div>
    </div>

	<div class="main_container">

		<div class="side"> ads section</div>

		<div class="main">
			<?php 
            	foreach ($result as $row) {
			?>
					<div class="result-section-item">
						<img class="restaurant-image" src="imgs/<?php echo $row['restau_img']; ?>">
						<div class="restaurant-name-txt"><?php echo $row['r_name']; ?></div>
						<div class="restaurant-rating-reviews-section">
							<img class="star" src="icons/solidstar.png">
							<img class="star" src="icons/solidstar.png">
							<img class="star" src="icons/solidstar.png">
							<img class="star" src="icons/solidstar.png">
							<img class="star" src="icons/emptystar.png">
							<div class="number-of-reviews-txt"><?php echo get_number_of_reviews($row['r_email']); ?> reviews</div>
						</div>
						<div class="restaurant-location-txt"><?php echo $row['location']; ?></div>
					</div>
			<?php
				}
			?>
				
				
				<!--for the moment we will display all resulting items at once-->
				<!--div class="bottom-bar">
					<button type="button"><img src="icons/goleft.png"></button>
					<button type="button"><img src="icons/1_filled.png"></button>
					<button type="button"><img src="icons/2_nofilled.png"></button>
					<button type="button"><img src="icons/dots.png"></button>
					<button type="button"><img src="icons/4_nofilled.png"></button>
					<button type="button"><img src="icons/goright.png"></button>
				</div-->
		</div>
	</div>	