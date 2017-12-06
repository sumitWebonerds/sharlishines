import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import 'rxjs/add/operator/map';
import { Storage } from '@ionic/storage';
import { ToastProvider } from '../../providers/toast/toast';

@Injectable()
export class ServicesProvider {
public wishlist;
public cart;
  public data; 
  public obj =  {
    str : "",
    sort : "",
    search : "",
    category : "",
    till : 0
  };

  constructor(public http: Http,public storage:Storage,public toast:ToastProvider) {
    console.log('Hello ServicesProvider Provider');
     this.storage.get('wishlist').then((data) => {
      if(data){
        this.wishlist = JSON.parse(data); 
      }else{
        this.wishlist = {
          items : []
        };
      }  
    });

    this.storage.get('cart').then((data) => {
      if(data){
        this.cart = JSON.parse(data); 
      }else{
        this.cart = {
          items : []
        };
      }  
    });

  }
  
    loadProductList(id,url) {
      console.log('insideservice',id);
      if (this.data) {
        return Promise.resolve(this.data);
      }
      this.obj.str = url+"/products/product-list&product_id=" + id;
      return new Promise(resolve => {

        this.http.get(this.obj.str)
          .map(res => res.json())
          .subscribe(data => {
            this.data = data;
            resolve(this.data);
          });
      });
  }
  
  
  loadCategoriesList(url) {
      if (this.data) {
        return Promise.resolve(this.data);
      }
      this.obj.str = url+"/products/categories-list";
      return new Promise(resolve => {

        this.http.get(this.obj.str)
          .map(res => res.json())
          .subscribe(data => {
            this.data = data;
            resolve(this.data);
          });
      });
  }

  loadSlidersList(url) {
      if (this.data) {
        return Promise.resolve(this.data);
      }
      this.obj.str = url+"/products/slider-list";
      return new Promise(resolve => {

        this.http.get(this.obj.str)
          .map(res => res.json())
          .subscribe(data => {
            this.data = data;
            resolve(this.data);
          });
      });
  }

  loadWishlist(id,image,name,price){
    if (this.findItemInWishlist(id) != -1) {
        this.wishlist.items.splice(this.findItemInWishlist(id), 1);
        this.toast.loadToast("Removed from wishlist");
    }else{
      this.wishlist.items.push({"id":id,"image":image,"name":name,"price":price});
       this.toast.loadToast("Added to wishlist");
    }
    this.storage.set('wishlist',JSON.stringify(this.wishlist));
    return Promise.resolve(this.wishlist);  
  }

  addToCart(id,image,name,price,tpackage,qauntity){
    if (this.findItemInCart(id) != -1) {
      debugger;
        // this.cart.items.splice(this.findItemInCart(id), 1);
        this.toast.loadToast("success");
       for (var i = 0, len = this.cart.items.length; i < len; i++) {
          console.log(this.cart.items);  
          debugger;
          if (this.cart.items[i].id === id) {
                  this.cart.items[i].price += parseFloat(price);
                  this.cart.items[i].qauntity += 1;
            }
       }
       debugger;
    }else{
      debugger;
      this.cart.items.push({"id":id,"image":image,"name":name,"price":parseFloat(price),"package":tpackage,"qauntity":parseInt(qauntity)});
       this.toast.loadToast("Added to cart");
    }
    var item =   this.cart;
    debugger;
    this.storage.set('cart',JSON.stringify(this.cart));
    return Promise.resolve(this.cart);
  }

  findItemInWishlist(id){
          var result = -1;
        for (var i = 0, len = this.wishlist.items.length; i < len; i++) {
            if (this.wishlist.items[i].id === id) {
                result = i;
                break;
            }
        }
        return result;
  }

  findItemInCart(id){
          var result = -1;
        for (var i = 0, len = this.cart.items.length; i < len; i++) {
            if (this.cart.items[i].id === id) {
                result = i;
                break;
            }
        }
        return result;
  }

  loadWishlistItems(){
    console.log('List wishlist items');
    var list =  this.storage.get('wishlist');
     return Promise.resolve(list); 
  }

}
