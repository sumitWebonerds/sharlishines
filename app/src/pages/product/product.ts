import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { ServicesProvider } from '../../providers/services/services';
import { localglobal } from "../localglobal";
import { Storage } from '@ionic/storage';
import { SocialsharingProvider } from '../../providers/socialsharing/socialsharing';
import { ToastProvider } from '../../providers/toast/toast';
import { CartPage } from '../cart/cart';
import { TruncateModule } from 'ng2-truncate';

@IonicPage()
@Component({
  selector: 'page-product',
  templateUrl: 'product.html',
  providers:[ServicesProvider,SocialsharingProvider], 
})
export class ProductPage {
  public product;
  public IMG_URL;
  public url;
  public wishListStatus;
  public wishListItems;
  truncating = true;
  constructor(public navCtrl: NavController, public navParams: NavParams,public service: ServicesProvider,public storage: Storage, public sharing: SocialsharingProvider,public toast: ToastProvider) {
    this.url = localglobal.url;
    this.IMG_URL = localglobal.IMG_URL;
    this.product = navParams.get('product');
    console.log(this.product);
  }

  public wishlist(id,image,name,price){
    this.service.loadWishlist(id,image,name,price).then(data => {
      console.log(data);
      this.ionViewDidLoad();
    });
  }

  public share(message,image,url)
  {
    var imageFile = localglobal.IMG_URL + image;
    this.sharing.shareOnSocial(message,imageFile,url);
  }
// id,image,name,price,tpackage,qauntity
  public addToCart(id,image,name,price,tpackage,qauntity){
    this.service.addToCart(id,image,name,price,tpackage,qauntity).then(data => {
      console.log(data);
      this.ionViewDidLoad();
    });
  // var cart = {};
  //  cart.image = image;
  //  cart.id = id;
  //  cart.name = name;
  //  cart.price = price;
  //  cart.package = product.package;  
    // console.log(cart);
  }

  navigateToCart(){
    this.navCtrl.push(CartPage);
  }

  ionViewDidLoad() {
    this.storage.get('wishlist').then((val) =>{
        if(val){
          this.wishListItems = JSON.parse(val);
          if (this.service.findItemInWishlist(this.product.id ) != -1){
            this.wishListStatus = true;
          }else{
           this.wishListStatus = false; 
          } 
        }
    });
    console.log('ionViewDidLoad ProductPage');
  }

}
