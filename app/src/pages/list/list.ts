import { Component } from '@angular/core';
import { NavController, NavParams } from 'ionic-angular';
import { ServicesProvider } from '../../providers/services/services';
import { HomePage } from '../home/home';
import { LoadingController } from 'ionic-angular';
import { Observable } from 'rxjs/Observable';
import { localglobal } from "../localglobal";
import { ProductPage } from '../product/product';

@Component({
  selector: 'page-list',
  templateUrl: 'list.html',
   providers: [ ServicesProvider ]
})
export class ListPage {
  params:any;
  productList;
  public IMG_URL;
  public url;
  qty:any;
  cart;

  constructor(public navCtrl: NavController, public navParams: NavParams,public service: ServicesProvider,public loadingCtrl: LoadingController) {
    this.params = navParams.get('category');
    console.log('cat');
    this.productList = [];
    this.cart = [];
    this.url = localglobal.url;
    this.IMG_URL = localglobal.IMG_URL;
    this.qty = 1;
    this.loadProductByCategory(this.url);
  }
  
  loadProductByCategory(url){
     let loader = this.loadingCtrl.create({
      content: "Please wait...",
      duration: 3000
    });
    loader.present();
    this.service.loadProductList(this.params,url)
    .then(data => {
      loader.dismiss();
        this.productList = data.data;
    }); 
  }

  // increment product qty
  incrementQty(id) {
    console.log(this.qty+1);
    this.qty += 1;
  }

  // decrement product qty
  decrementQty() {
    if(this.qty-1 < 1 ){
      this.qty = 1
      console.log('1->'+this.qty);
    }else{
      this.qty -= 1;
      console.log('2->'+this.qty);
    }
  }


  goBack(){
    this.navCtrl.pop();
  }
  public openDetail(obj){
    this.navCtrl.push(ProductPage,{
      product:obj
    });
  }

  ionViewDidLoad(){
    console.log('loaded');
     
  }
  
}
