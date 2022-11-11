export const createPostForm = document.getElementById('create-post-form');
export const postsContainer = document.getElementById('posts-container');

export const csrfToken = document.querySelector('meta[name="_token"]').getAttribute('content');
export const userId = localStorage.getItem('user_id');

// Routes
export const postImagesUploadRoute = '/posts/image/upload';
export const createPostRoute = '/posts/create';
export const checkLikeRoute = '/posts/check-like';
export const likeUnlikeRoute = '/posts/like-unlike';
