import { NgModule } from '@angular/core';
import { TruncatestringComponent } from './truncatestring/truncatestring';
import { CartCountComponent } from './cart-count/cart-count';
@NgModule({
	declarations: [TruncatestringComponent,
    CartCountComponent],
	imports: [],
	exports: [TruncatestringComponent,
    CartCountComponent]
})
export class ComponentsModule {}
