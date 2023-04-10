export const APP_TOKEN_NAME = "TOKEN";

export const unAuthenticatedRoutes = {
  LOGIN: "/",
  REGISTER: "/register",
};
export const authenticatedRoutes = {
  DASHBOARD: "/",

  CATEGORIES: "/categories",
  ADD_CATEGORY: "/category/add",
  EDIT_CATEGORY: "/category/edit/:id",

  POSTS: "/posts",
  ADD_POST: "/post/add",
  EDIT_POST: "/posts/edit/:id",

  USERS: "/users",
  ADD_USERS: "/users/add",
  EDIT_USERS: "/users/edit/:id",
  COMMENTS: "/comments",
};

export const FooterText = "AHSAN copyright 2023";

export const globalReactQueryOptions = {
  refetchOnMount: "always",
};
