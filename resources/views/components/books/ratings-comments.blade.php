 <link rel="stylesheet" href="{{ asset('css/web/ratings_comments.css') }}">
 <div class="comments-section">
            <div class="comments-header">
                <h3><strong>Ratings & Comments</strong></h3>

                <!-- as avg number and stars-->
                 
                
                <div class="avgRate">
                    <div class="avgRateNum">
                        @if ($averageRating)
                            <strong>{{ number_format($averageRating, 2) }}</strong>
                        @else
                            <span>No ratings yet</span>
                        @endif
                    </div>
                    <div class="avgRateStars">
                    @php
                        if ($averageRating) {
                            $fullStars = floor((float) $averageRating);
                            $halfStar = ($averageRating - $fullStars) >= 0.5;
                            $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                        } else {
                            $fullStars = 0;
                            $halfStar = false;
                            $emptyStars = 5;
                        }
                    @endphp

                    {{-- Full stars --}}
                    @for ($i = 0; $i < $fullStars; $i++)
                        <i class="fas fa-star" style="color: #FFD700;"></i>
                    @endfor

                    {{-- Half star --}}
                    @if ($halfStar)
                        <i class="fas fa-star-half-alt" style="color: #FFD700;"></i>
                    @endif

                    {{-- Empty stars --}}
                    @for ($i = 0; $i < $emptyStars; $i++)
                        <i class="far fa-star" style="color: #FFD700;"></i>
                    @endfor

                    <span id="total-ratings" style="margin-left: 8px; color: #666;">
                        {{ $totalRatings > 0 ? $totalRatings . ' Ratings' : 'No Ratings Yet' }}
                    </span>
                </div>

                </div>
            </div>

            <h4 style="margin-bottom: 20px;">Helpful Comments</h4>

@if ($comments->isEmpty())
    <div class="no-comments" style="color: #666; font-style: italic; margin-bottom: 20px;">
        No comments yet. Be the first to share your thoughts!
    </div>
@else
    @foreach ($comments as $comment)
        <div class="comment">
            <div class="comment-content">
                <div class="comment-title">{{ $comment->comment_title }}</div>
                <div class="comment-text">{{ $comment->comment_text }}</div>
                <div class="comment-meta">
                    {{ $comment->username }} –
                    {{ \Carbon\Carbon::createFromTimestamp(strtotime($comment->created_at))->diffForHumans() }}
                </div>
            </div>
        </div>
    @endforeach
@endif

            <hr style="margin: 15px 0;">

            <div class="tapToRate">
    <span>Tap to rate</span>
    <form action="{{route('ratings', ['book_id' => $book->book_id])}}" method="post">
        @csrf
        <div class="stars">
            <input type="radio" id="star5" name="rating" value="5">
            <label for="star5" title="5 stars"><i class="fa fa-star"></i></label>

            <input type="radio" id="star4" name="rating" value="4">
            <label for="star4" title="4 stars"><i class="fa fa-star"></i></label>

            <input type="radio" id="star3" name="rating" value="3">
            <label for="star3" title="3 stars"><i class="fa fa-star"></i></label>

            <input type="radio" id="star2" name="rating" value="2">
            <label for="star2" title="2 stars"><i class="fa fa-star"></i></label>

            <input type="radio" id="star1" name="rating" value="1">
            <label for="star1" title="1 star"><i class="fa fa-star"></i></label>
        </div>

        <button type="submit" class="btn-rate">Rate now</button>
    </form>
</div>
            

            <div class="writeComment">
                <button class="btn-cmt"><i class="fa-solid fa-pen-to-square" ></i> Write a Comment</button>
            </div>
            <div class="hiddenCmtForm">
                <form action="{{route('writeComment', ['book_id' => $book->book_id])}}" method="post">
                    @csrf
                    <label for="title">Title
                        <input type="text" name="comment_title">
                    </label>
                    <label for="comment">Comment
                        <input type="text" name="comment_text">
                    </label>

                    <button type="submit" class="btn-submit">Submit</button>
                    <button type="button" class="btn-cancel">Cancel</button>
                </form>
            </div>

        </div>
    </div>

<script src="{{ asset('js/web/ratings_comments.js') }}"></script>