import { Component, Input  } from '@angular/core';

@Component({
  selector: 'truncatestring',
  templateUrl: 'truncatestring.html'
})
export class TruncatestringComponent {

  @Input() text: string;
  @Input() limit: number = 40;
  truncating = true;

}
