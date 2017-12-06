import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { ServicesProvider } from '../../providers/services/services';

import { localglobal } from "../localglobal";
import { ProductPage } from "../product/product";

@IonicPage()
@Component({
  selector: 'page-wishlist',
  templateUrl: 'wishlist.html',
})
export class WishlistPage {

  public wishListItems;
  public itemList;
  public IMG_URL;
  public url;
  constructor(public navCtrl: NavController, public navParams: NavParams,public service: ServicesProvider) {
    this.url = localglobal.url;
    this.IMG_URL = localglobal.IMG_URL;
  }

  public openDetail(obj){
    this.navCtrl.push(ProductPage,{
      product:obj
    });
  }

  ionViewDidLoad() {
    this.service.loadWishlistItems().then(data => {
    this.itemList = JSON.parse(data);
    this.wishListItems =  this.itemList.items;
    console.log('items',this.itemList.items);
    });
  }

}
