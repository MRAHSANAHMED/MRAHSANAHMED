export const APP_TOKEN_NAME = "TOKEN";
export const unAuthenticatedRoutes = {
  HOME: "/",
  LOGIN: "/login",
  REGISTER: "/register",
  POST_DETAIL: "/post/:post_id",
};

export const authenticatedRoutes = {
  DASHBOARD: "/",

  CATEGORIES: "/categories",
  ADD_CATEOGRY: "/category/add",
  EDIT_CATEGORY: "/category/edit/:id",

  POSTS: "/posts",
  ADD_POST: "/posts/add",
  EDIT_POST: "/posts/edit/:id",

  USERS: "/users",
  ADD_USER: "/users/add",
  EDIT_USER: "/users/edit/:id",

  COMMENTS: "/comments",
};
export const FooterText = "copyright 2023";
export const globalReactQueryOptions = {
  refetchOnMount: "always",
};
