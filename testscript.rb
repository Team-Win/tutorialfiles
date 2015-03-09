# some ruby code goes here - to put in latersmdjfbdhs bvjdhvfj bcj

class ProductsController < ApplicationController

  def index
    @products = Product.all
  end

  def show

  end

  def new

  end

  def edit

  end
  
  private
  def product_params
  params.require(:product).permit(:product_name, :description,:price, :thumburl)
  end
end
